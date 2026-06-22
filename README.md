# ZMsite - WordPress Deployment via Docker Compose

This repository contains the configuration files and custom theme source code for the ZMsite. It is designed to be deployed using Docker Compose on a Linux server.

## Folder Structure

- `docker-compose.yml`: Defines the MySQL and WordPress container services.
- `db_init/`: Contains `zhongming-local.sql` which automatically initializes the WordPress database on first run.
- `wp-content/themes/zhongming-theme/`: Custom WordPress theme code.

---

## Deployment Guide (Ubuntu Server 43.133.36.40)

### Step 1: Install Docker and Docker Compose (if not already installed)

Run the following commands on your server:

```bash
# Update package list
sudo apt-get update

# Install Docker
sudo apt-get install -y docker.io

# Install Docker Compose
sudo apt-get install -y docker-compose

# Start and enable Docker service
sudo systemctl start docker
sudo systemctl enable docker
```

---

### Step 2: Clone the Repository

On your server, create a directory for the site (e.g., `/data/zmsite`) and clone this repository:

```bash
# Create directory
sudo mkdir -p /data/zmsite
sudo chown -R $USER:$USER /data/zmsite
cd /data/zmsite

# Clone repository
git clone https://github.com/osaxiaomai/ZMsite.git .
```

---

### Step 3: Replace Domain in Database Dump

Since the database dump `db_init/zhongming-local.sql` contains the placeholder `https://[PRODUCTION_DOMAIN]`, replace it with your server IP and access port (`http://43.133.36.40:8001`):

```bash
# Replace domain in SQL dump
sed -i 's/https:\/\/\[PRODUCTION_DOMAIN\]/http:\/\/43.133.36.40:8001/g' db_init/zhongming-local.sql
```

---

### Step 4: Transfer and Extract wp-content Assets

Transfer the packaged assets file `zhongming-wp-content.tar.gz` from your local machine to the server directory `/data/zmsite` (you can use WinSCP, Mobaxterm, or `scp` command).

Once the tarball is uploaded to the server, extract it to restore all plugins, uploads, and media:

```bash
# Extract wp-content archive (this will extract folders into /data/zmsite/wp-content)
tar -xzf zhongming-wp-content.tar.gz
```

---

### Step 5: Start the Containers

Launch the Docker containers in background mode:

```bash
# Start containers
docker-compose up -d
```

WordPress will start on port `8001` and MySQL will run internally on port `3306` (mapped to `10006` on the host).

---

### Step 6: Access and Verify

Open your browser and visit:
`http://43.133.36.40:8001`

*(Note: If port `8001` is blocked by your cloud provider firewall, make sure to open it in your Tencent Cloud/Alibaba Cloud security group settings.)*
