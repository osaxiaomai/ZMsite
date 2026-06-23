with open(r"d:\Dev\zhongming\app\public\wp-content\themes\zhongming-theme\style.css", "r", encoding="utf-8", errors="ignore") as f:
    for line_no, line in enumerate(f, 1):
        if "hero-" in line:
            print(f"Line {line_no}: {line.strip()}")
