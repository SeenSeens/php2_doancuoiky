# Đồ án PHP MVC

## Cấu trúc thư mục dự án
- app
  - controllers
  - errors
  - helpers
  - models
  - repositories
  - views
    - backend
    - frontend
  - App.php
- configs
- core
  - Connection.php
  - Controller.php
  - Database.php
  - Model.php
  - Route.php
- docs
- public
  - css
  - fonts
  - images
  - js
  - upload
- ultils
- access.log
- bootstrap.php
- db.json
- error.php
- index.php
- README.md

## Mô tả thư mục dự án
### Controller
> Chịu trách nhiệm điều khiển & xử lý các yêu cầu từ người dùng.
> * Nhận yêu cầu từ người dùng
> * Chuyển hướng (Routing)
> * Tương tác với Model
### Models
### Views
### errors
### public
> Lưu trữ style, scripts, fonts, images
### core
> Chứa các thành phần cốt lõi của dự án
> * Route.php **Chịu trách nhiệm xử lý router**
### docs
> Chứa tài liệu chi tiết của dự án


## Query Builder