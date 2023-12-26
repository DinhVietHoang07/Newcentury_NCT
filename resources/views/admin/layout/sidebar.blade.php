<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="./index.html">Home 1</a></li>
                    <!-- <li><a href="./index-2.html">Home 2</a></li> -->
                </ul>
            </li>
            <li>
                <a href="{{ route('admin.information.index') }}" aria-expanded="false">
                    <i class="icon-info menu-icon"></i><span class="nav-text">Thông tin công ty</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.service.index') }}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Dịch vụ</span>
                </a>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Sản phẩm</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.house.index') }}">Sản phẩm</a></li>
                    <li><a href="{{ route('admin.house.create') }}">Đăng sản phẩm</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('admin.contact.index') }}" aria-expanded="false">
                    <i class="icon-user-follow menu-icon"></i><span class="nav-text">Liên hệ</span>
                </a>
            </li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-book-open menu-icon"></i><span class="nav-text">Bài viết</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.blog.create') }}">Thêm bài viết</a></li>
                    <li><a href="{{ route('admin.blog.index') }}">Bài viết</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
