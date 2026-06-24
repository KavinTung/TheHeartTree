# 💖 The Heart Tree

> Một món quà nhỏ được tạo nên từ tình yêu, ký ức và những khoảnh khắc muốn lưu giữ mãi theo thời gian.  
> Hiệu ứng cây tình yêu nở hoa, lời nhắn chạy từng dòng, đồng hồ đếm thời gian bên nhau và giai điệu nền tạo nên một trang web kỷ niệm đầy cảm xúc.

![Love Tree Preview](image/favicon.ico)

---

## 🌸 Giới thiệu

**The Heart Tree** là website hiệu ứng cây tình yêu được xây dựng bằng HTML, CSS, JavaScript và Canvas.

Trang web hiển thị:

- 🌳 Hiệu ứng cây tình yêu nở hoa bằng Canvas.
- 💌 Nội dung lời nhắn chạy theo hiệu ứng typewriter.
- ⏳ Đồng hồ đếm thời gian yêu nhau theo năm, ngày, giờ, phút, giây.
- 🎵 Nhạc nền tự phát khi trình duyệt cho phép.
- 🖱️ Nút bật/tắt nhạc khi trình duyệt chặn autoplay.
- 📱 Hỗ trợ hiển thị tốt hơn trên nhiều kích thước màn hình.

Dự án phù hợp để làm:

- Website kỷ niệm tình yêu.
- Quà tặng sinh nhật, ngày cưới, Valentine hoặc ngày đặc biệt.
- Landing page cá nhân mang phong cách lãng mạn.
- Mẫu website hiệu ứng Canvas đơn giản, nhẹ và dễ tùy chỉnh.

**Đối với xem trên Mobile**: 
- Để xem tốt nhất cần bật chế độ "Trang cho Máy tính" trên trình duyệt điện thoại để xem đầy đủ giao diện đẹp, mượt.
---

## ✨ Demo
- Xem bản demo tại: ***https://kavil.ink/HeartTree***
Bạn có thể tùy chỉnh các nội dung sau trong dự án:

- Tên hai người.
- Lời nhắn tình yêu.
- Ngày bắt đầu yêu nhau.
- Bài nhạc nền.
- Ảnh favicon.
- Link mạng xã hội hoặc GitHub.
- Màu chữ, kích thước chữ và bố cục hiển thị.

---

## 🗂️ Cấu trúc thư mục

```text
TheHeartTree/
│
├── index.php
│
├── image/
│   └── favicon.ico
│
├── music/
│   └── ido.mp3
│
└── renxi/
    ├── default.css
    ├── scroll.css
    ├── jquery.min.js
    ├── jscex.min.js
    ├── jscex-parser.js
    ├── jscex-jit.js
    ├── jscex-builderbase.min.js
    ├── jscex-async.min.js
    ├── jscex-async-powerpack.min.js
    ├── functions.js
    └── love.js
```
## 🚀 Hướng dẫn cài đặt

Dự án này là website tĩnh đơn giản, không sử dụng cơ sở dữ liệu và không yêu cầu cấu hình phức tạp.
Bạn chỉ cần upload đúng cấu trúc file là có thể sử dụng.

### 💻 Chạy Offline bằng XAMPP
**Bước 1: Cài XAMPP**

- Tải và cài đặt XAMPP: https://www.apachefriends.org/

- Sau khi cài đặt, mở XAMPP Control Panel và bật: Apache

Không cần bật MySQL vì dự án không dùng database.

**Bước 2: Chép project vào thư mục htdocs**

- Chép toàn bộ thư mục project vào: C:\xampp\htdocs\

Ví dụ:

```C:\xampp\htdocs\TheHeartTree\```

Cấu trúc sau khi chép:
```
C:\xampp\htdocs\TheHeartTree\index.php
C:\xampp\htdocs\TheHeartTree\music\ido.mp3
C:\xampp\htdocs\TheHeartTree\renxi\default.css
...
```
**Bước 3: Mở website trên trình duyệt**

- Truy cập: ```http://localhost/TheHeartTree/```

Hoặc: ```http://localhost/TheHeartTree/index.php```

### 🌐 Upload lên Hosting Online
**Bước 1: Mở File Manager hoặc FTP của hosting và upload các files lên đúng cấu trúc.**

Bạn có thể upload bằng một trong các công cụ:

- cPanel File Manager.
- DirectAdmin File Manager.
- FTP Client như FileZilla.
- Hosting Panel của nhà cung cấp.

**Bước 2: Upload vào thư mục public_html**

- Upload toàn bộ file và thư mục trong project vào: **public_html**

Ví dụ:
```
public_html/
│
├── index.php
├── image/
├── music/
└── renxi/
```
- Sau khi upload xong, truy cập tên miền của bạn: https://tenmiencuaban.com/

## ✏️ Tùy chỉnh nội dung
**Thay lời nhắn tình yêu**

- Mở file: index.php
- Tìm phần: 
```<span class="say">Vợ Thỏ ơi,</span>```

Sau đó thay đổi nội dung theo ý muốn.

**Thay ngày bắt đầu yêu nhau**

- Mở file: **index.php**

- Tìm đoạn: ```together.setFullYear(2017, 10, 20);```

**Lưu ý** tháng trong JavaScript bắt đầu từ 0.

Ví dụ muốn đặt ngày bắt đầu là 14/02/2024:

```together.setFullYear(2024, 1, 14);```

**Thay nhạc nền**

- Thay file nhạc trong thư mục: ```music/```

Ví dụ: music/ido.mp3

Nếu đổi tên file nhạc, cần cập nhật lại trong **index.php**:

```<source src="music/ten-bai-hat-moi.mp3" type="audio/mpeg">```

**Thay link GitHub hoặc mạng xã hội**

- Trong file **index.php**, tìm phần:

```<strong>Src Github:</strong>```

- Sau đó thay đường dẫn theo nhu cầu.

## 🛠️ Công nghệ sử dụng
- HTML5
- CSS3
- JavaScript
- jQuery
- HTML Canvas
- Jscex Async
- Typewriter Effect

📌 Ghi chú: **Đây là project frontend đơn giản**, không cần:
- Cấu hình server riêng
- Tạo database
- Cài Composer
- Cài Node.js
- Cài npm
- Tạo file .env
- Kết nối MySQL
**Chỉ cần upload đúng file là website có thể chạy.**

## ❤️ Moditify by **Kavin Tùng**
