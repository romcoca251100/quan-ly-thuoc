<h2>Cách cài đặt</h2>
<p> - Cài đặt xampp (hoặc warmpp)</p>
<p> - Cài đặt composer (<a href="https://getcomposer.org/Composer-Setup.exe">Link</a>)</p>
<p> - Trong khi cài đặt composer, trỏ đường dần php về file php.exe của xampp (hoặc warmpp)</p>
<p> - Clone code trên github về máy</p>
<p> - Cho code vào thư mục htdocs của xampp (hoặc warmpp)</p>
<p> - Vào trong thư mục của project</p>
<p> - Giữ Shift + click chuột phải -> Open Powershell here</p>
<p> - Gõ lệnh: <i>composer install</i></p>
<p> - Gõ lệnh: <i>cp .env.example .env</i></p>
<p> - Gõ lệnh: <i>php artisan key:generate</i></p>
<p> - Khởi động xampp (hoặc warmpp) và tạo 1 database mới</p>
<p> - Mở file <span style="color: red">.evn</span> trong project</p>
<p> - Thay đổi các thông số trong <i>DB_DATABASE, DB_USERNAME, DB_PASSWORD</i> cho phù hợp với lại database vừa tạo</p>
<p> - Gõ tiếp lệnh trong Open Powershell vừa mở: <i>php artisan migrate</i></p>
<p> - Gõ lệnh: <i>php artisan db:seed</i></p>
<p> - Gõ lệnh : <i>php artisan serve</i> để chạy project</p>

<hr>
