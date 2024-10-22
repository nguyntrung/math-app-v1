<!-- Navbar Start -->
<div class="container-fluid bg-light position-relative shadow">
    <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5">
        <a href="{{ route('home') }}" class="navbar-brand font-weight-bold text-secondary" style="font-size: 30px;">
            <i class="flaticon-043-teddy-bear"></i>
            <span class="text-primary">ToanLop5.vn</span>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav font-weight-bold mx-auto py-0">
                <a href="{{ route('home') }}" class="nav-item nav-link active">Trang chủ</a>
                <a href="{{ route('lessons.videos') }}" class="nav-item nav-link">Bài giảng</a>
                <a href="{{ route('lessons.theory') }}" class="nav-item nav-link">Lý thuyết</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Luyện tập</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="#" class="dropdown-item">Bài luyện tập</a>
                        <a href="{{ route('lessons.solutions') }}" class="dropdown-item">Giải bài tập SGK</a>
                        <a href="#" class="dropdown-item">Làm bài kiểm tra</a>
                    </div>
                </div>
                <a href="contact.html" class="nav-item nav-link">Liên hệ</a>
                <a href="about.html" class="nav-item nav-link">Về chúng tôi</a>
            </div>
            <button class="btn btn-primary px-4">Đăng nhập</button>
        </div>
    </nav>
</div>
<!-- Navbar End -->

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog mt-5">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Đăng nhập</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="loginForm"  method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="text">Email</label>
                        <input type="text" class="form-control" id="text">
                    </div>
                    <div class="form-group">
                        <label for="loginPassword">Mật khẩu</label>
                        <input type="password" class="form-control" id="loginPassword" required>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Ghi nhớ đăng nhập</label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                </form>
                <hr>
                <p class="text-center">Chưa có tài khoản? 
                    <a href="#" id="showRegister">Đăng ký ngay</a>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Registration Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog mt-7">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Đăng ký</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="registerForm"  method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <label for="registerName">Họ và tên</label>
                        <input type="text" class="form-control" id="registerName" required>
                    </div>
                    <div class="form-group">
                        <label for="registerEmail">Email</label>
                        <input type="email" class="form-control" id="registerEmail" required>
                    </div>
                    <div class="form-group">
                        <label for="registerPassword">Mật khẩu</label>
                        <input type="password" class="form-control" id="registerPassword" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Xác nhận mật khẩu</label>
                        <input type="password" class="form-control" id="confirmPassword" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
                </form>
                <hr>
                <p class="text-center">Đã có tài khoản? 
                    <a href="#" id="showLogin">Đăng nhập</a>
                </p>
            </div>
        </div>
    </div>
</div>

<script>
// Add click event to login button
document.querySelector('.btn-primary.px-4').addEventListener('click', function(e) {
    e.preventDefault();
    $('#loginModal').modal('show');
});

// Switch between login and register modals
document.getElementById('showRegister').addEventListener('click', function(e) {
    e.preventDefault();
    $('#loginModal').modal('hide');
    $('#registerModal').modal('show');
});

document.getElementById('showLogin').addEventListener('click', function(e) {
    e.preventDefault();
    $('#registerModal').modal('hide');
    $('#loginModal').modal('show');
});

// Handle form submissions
document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();
    // Add your login logic here
    console.log('Login submitted');
});

document.getElementById('registerForm').addEventListener('submit', function(e) {
    e.preventDefault();
    // Add your registration logic here
    console.log('Registration submitted');
});
</script>