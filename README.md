# MiniShop - Lập trình Hướng đối tượng (OOP) & Session (Buổi 3)

Dự án thực hành Buổi 3 môn học lập trình Backend với PHP. Ở dự án này, hệ thống MiniShop đã được nâng cấp từ lập trình hướng cấu trúc sang lập trình Hướng đối tượng (OOP), đồng thời tích hợp hệ thống bảo mật đăng nhập và quản lý trạng thái bằng Session.

## 🚀 Các chức năng đã hoàn thành
- [x] **Xây dựng Class (OOP):** Tạo thành công các lớp `Product` và `Category` với các thuộc tính và phương thức (methods) được đóng gói chuẩn mực.
- [x] **Bảo mật Đăng nhập:** Hệ thống Login nhận dữ liệu qua phương thức POST và lưu trạng thái bảo mật vào `$_SESSION`.
- [x] **Bảo vệ tuyến đường (Guard):** Trang `dashboard.php` tự động chặn và điều hướng về trang đăng nhập nếu người dùng chưa xác thực (truy cập trái phép).
- [x] **Hiển thị dữ liệu qua Object:** Render danh sách 8 sản phẩm thông qua Object. Tính tổng giá trị kho hàng đạt mốc **41.380.000 đ** bằng cách gọi phương thức `$p->lineTotal()`.
- [x] **Lưu trạng thái Đặt hàng:** Chức năng "Đặt thử" sử dụng Session để duy trì dữ liệu đơn hàng thành công ngay cả khi người dùng tải lại trang (F5).

## 🔐 Thông tin Đăng nhập (Môi trường Test)
- **Username:** `admin`
- **Password:** `MiniShop@03`

## ⚙️ Hướng dẫn cài đặt & Chạy dự án
1. Khởi động dịch vụ **Apache** thông qua phần mềm XAMPP.
2. Đặt toàn bộ thư mục mã nguồn dự án vào đường dẫn gốc: `C:\xampp\htdocs\minishop-03\`
3. Mở trình duyệt Web và truy cập vào: `http://localhost/minishop-03/`
4. Hệ thống sẽ tự động điều hướng sang trang `login.php` để yêu cầu xác thực.