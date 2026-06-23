import pymysql
import os

DB_HOST = "127.0.0.1"
DB_PORT = 10006
DB_USER = "root"
DB_PASS = "root"
DB_NAME = "local"

# Product IDs we added for P1.25 and P1.5 L-Poster
ids = [883, 884, 885, 886]

def main():
    conn = pymysql.connect(
        host=DB_HOST,
        port=DB_PORT,
        user=DB_USER,
        password=DB_PASS,
        database=DB_NAME,
        charset='utf8mb4',
        cursorclass=pymysql.cursors.DictCursor
    )
    
    output_file = r'db_init\add_p125_p15.sql'
    
    try:
        with open(output_file, 'w', encoding='utf-8') as f:
            f.write("-- SQL script to add missing L-Poster P1.25 and P1.5 products without wiping the database\n\n")
            
            with conn.cursor() as cur:
                # 1. Dump wp_posts rows
                f.write("-- 1. Insert into wp_posts\n")
                for pid in ids:
                    cur.execute(f"SELECT * FROM wp_posts WHERE ID = {pid}")
                    row = cur.fetchone()
                    if row:
                        val_strs = []
                        for col in row.keys():
                            val = row[col]
                            if val is None:
                                val_strs.append("NULL")
                            elif isinstance(val, (int, float)):
                                val_strs.append(str(val))
                            elif isinstance(val, bytes):
                                val_strs.append(f"0x{val.hex()}")
                            else:
                                escaped = conn.escape(val)
                                val_strs.append(escaped)
                        
                        f.write(f"DELETE FROM `wp_posts` WHERE `ID` = {pid};\n")
                        f.write(f"INSERT INTO `wp_posts` VALUES ({','.join(val_strs)});\n")
                f.write("\n")
                
                # 2. Dump wp_postmeta rows
                f.write("-- 2. Insert into wp_postmeta\n")
                for pid in ids:
                    f.write(f"DELETE FROM `wp_postmeta` WHERE `post_id` = {pid};\n")
                    cur.execute(f"SELECT * FROM wp_postmeta WHERE post_id = {pid}")
                    rows = cur.fetchall()
                    if rows:
                        insert_vals = []
                        for row in rows:
                            val_strs = []
                            for col in ['meta_id', 'post_id', 'meta_key', 'meta_value']:
                                val = row[col]
                                if val is None:
                                    val_strs.append("NULL")
                                elif isinstance(val, (int, float)):
                                    val_strs.append(str(val))
                                else:
                                    escaped = conn.escape(val)
                                    val_strs.append(escaped)
                            insert_vals.append(f"({','.join(val_strs)})")
                        
                        f.write(f"INSERT INTO `wp_postmeta` VALUES {','.join(insert_vals)};\n")
                f.write("\n")
                
                # 3. Dump wp_term_relationships rows
                f.write("-- 3. Insert into wp_term_relationships\n")
                for pid in ids:
                    f.write(f"DELETE FROM `wp_term_relationships` WHERE `object_id` = {pid};\n")
                    cur.execute(f"SELECT * FROM wp_term_relationships WHERE object_id = {pid}")
                    rows = cur.fetchall()
                    if rows:
                        insert_vals = []
                        for row in rows:
                            val_strs = []
                            for col in ['object_id', 'term_taxonomy_id', 'term_order']:
                                val = row[col]
                                if val is None:
                                    val_strs.append("NULL")
                                else:
                                    val_strs.append(str(val))
                            insert_vals.append(f"({','.join(val_strs)})")
                        f.write(f"INSERT INTO `wp_term_relationships` VALUES {','.join(insert_vals)};\n")
                f.write("\n")
        
        print(f"Successfully generated incremental SQL file: {output_file}")
        
        # Replace local domain with production domain placeholder
        with open(output_file, 'r', encoding='utf-8') as f:
            sql_content = f.read()
        sql_content = sql_content.replace("http://zhongming.local", "https://[PRODUCTION_DOMAIN]")
        sql_content = sql_content.replace("http:\\/\\/zhongming.local", "https:\\/\\/[PRODUCTION_DOMAIN]")
        with open(output_file, 'w', encoding='utf-8') as f:
            f.write(sql_content)
            
    except Exception as e:
        print(f"Error: {e}")
    finally:
        conn.close()

if __name__ == '__main__':
    main()
