<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="{{ route('dashboard') }}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fas fa-hashtag me-2"></i>ECOLARA</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
        </div>
        <div class="navbar-nav w-100">
            <a href="{{ route('dashboard') }}" class="nav-item nav-link"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-list me-2"></i>Danh mục</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('addcategory') }}" class="dropdown-item"><i class="fas fa-plus me-2"></i>Thêm danh mục</a>
                    <a href="{{ route('allcategory') }}" class="dropdown-item"><i class="fas fa-list-alt me-2"></i>Danh sách danh mục</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-sliders-h me-2"></i>Slider</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('addslider') }}" class="dropdown-item"><i class="fas fa-plus me-2"></i>Thêm Slider</a>
                    <a href="{{ route('allslider') }}" class="dropdown-item"><i class="fas fa-list-alt me-2"></i>Danh sách Slider</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-tags me-2"></i>Loại sản phẩm</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('addsubcategory') }}" class="dropdown-item"><i class="fas fa-plus me-2"></i>Thêm loại</a>
                    <a href="{{ route('allsubcategory') }}" class="dropdown-item"><i class="fas fa-list-alt me-2"></i>Danh sách loại</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-box me-2"></i>Sản phẩm</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('addproduct') }}" class="dropdown-item"><i class="fas fa-plus me-2"></i>Thêm sản phẩm</a>
                    <a href="{{ route('allproduct') }}" class="dropdown-item"><i class="fas fa-list-alt me-2"></i>Danh sách sản phẩm</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-shopping-cart me-2"></i>Đơn hàng</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('allorder') }}" class="dropdown-item"><i class="fas fa-list me-2"></i>Toàn bộ đơn hàng</a>
                    <a href="{{ route('pendingorder') }}" class="dropdown-item"><i class="fas fa-hourglass-start me-2"></i>Đơn hàng đang xử lý</a>
                    <a href="#" class="dropdown-item"><i class="fas fa-check me-2"></i>Đơn hàng hoàn tất</a>
                    <a href="#" class="dropdown-item"><i class="fas fa-times me-2"></i>Bị huỷ</a>
                </div>
            </div>
        </div>
    </nav>
</div>
