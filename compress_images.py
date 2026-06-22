import os
import sys

try:
    from PIL import Image
except ImportError:
    print("Error: The 'Pillow' library is required to run this image compressor.")
    print("Please install it by running: pip3 install Pillow")
    sys.exit(1)

def compress_image(filepath, max_size_kb=500, max_dimension=2048):
    size_kb = os.path.getsize(filepath) / 1024
    if size_kb <= max_size_kb:
        return False
        
    try:
        img = Image.open(filepath)
        original_format = img.format
        if not original_format in ['JPEG', 'PNG', 'MPO']:
            return False
            
        # Resize if dimensions are extremely large
        width, height = img.size
        if width > max_dimension or height > max_dimension:
            if width > height:
                new_width = max_dimension
                new_height = int(height * (max_dimension / width))
            else:
                new_height = max_dimension
                new_width = int(width * (max_dimension / height))
            img = img.resize((new_width, new_height), Image.Resampling.LANCEZOS)
            
        # Compress and save
        if original_format == 'JPEG' or original_format == 'MPO':
            img.save(filepath, 'JPEG', quality=82, optimize=True)
        elif original_format == 'PNG':
            # Save PNG optimized
            img.save(filepath, 'PNG', optimize=True)
            
        new_size_kb = os.path.getsize(filepath) / 1024
        print(f"Compressed '{os.path.basename(filepath)}': {size_kb:.1f}KB -> {new_size_kb:.1f}KB (Saved {size_kb - new_size_kb:.1f}KB)")
        return True
    except Exception as e:
        print(f"Failed to compress '{filepath}': {e}")
        return False

def main():
    uploads_dir = "wp-content/uploads"
    if not os.path.exists(uploads_dir):
        print(f"Error: Uploads directory '{uploads_dir}' not found.")
        sys.exit(1)
        
    print(f"Scanning '{uploads_dir}' for large images (threshold: 500KB)...")
    count = 0
    compressed_count = 0
    
    for root, dirs, files in os.walk(uploads_dir):
        for file in files:
            ext = os.path.splitext(file)[1].lower()
            if ext in ['.jpg', '.jpeg', '.png']:
                filepath = os.path.join(root, file)
                count += 1
                if compress_image(filepath):
                    compressed_count += 1
                    
    print(f"\nScan finished. Checked {count} images, compressed {compressed_count} images.")

if __name__ == '__main__':
    main()
