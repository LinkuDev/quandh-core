<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
                    body .content .php-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost:8000";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.8.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.8.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;,&quot;php&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                                            <button type="button" class="lang-button" data-language-name="php">php</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-auth" class="tocify-header">
                <li class="tocify-item level-1" data-unique="auth">
                    <a href="#auth">Auth</a>
                </li>
                                    <ul id="tocify-subheader-auth" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="auth-POSTapi-auth-login">
                                <a href="#auth-POSTapi-auth-login">Đăng nhập</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="auth-POSTapi-auth-forgot-password">
                                <a href="#auth-POSTapi-auth-forgot-password">Quên mật khẩu</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="auth-POSTapi-auth-reset-password">
                                <a href="#auth-POSTapi-auth-reset-password">Đặt lại mật khẩu</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="auth-POSTapi-auth-logout">
                                <a href="#auth-POSTapi-auth-logout">Đăng xuất</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="auth-POSTapi-auth-switch-department">
                                <a href="#auth-POSTapi-auth-switch-department">Chuyển đơn vị làm việc</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="auth-GETapi-user">
                                <a href="#auth-GETapi-user">Lấy thông tin user đăng nhập hiện tại kèm roles và permissions của đơn vị đang chọn.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-core-department" class="tocify-header">
                <li class="tocify-item level-1" data-unique="core-department">
                    <a href="#core-department">Core - Department</a>
                </li>
                                    <ul id="tocify-subheader-core-department" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="core-department-GETapi-departments-public">
                                <a href="#core-department-GETapi-departments-public">Danh sách department công khai</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-department-GETapi-departments-public-options">
                                <a href="#core-department-GETapi-departments-public-options">Danh sách department công khai cho dropdown</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-department-GETapi-departments-export">
                                <a href="#core-department-GETapi-departments-export">Xuất danh sách department</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-department-POSTapi-departments-import">
                                <a href="#core-department-POSTapi-departments-import">Nhập danh sách department</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-department-POSTapi-departments-bulk-delete">
                                <a href="#core-department-POSTapi-departments-bulk-delete">Xóa hàng loạt department</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-department-PATCHapi-departments-bulk-status">
                                <a href="#core-department-PATCHapi-departments-bulk-status">Cập nhật trạng thái department hàng loạt</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-department-GETapi-departments-stats">
                                <a href="#core-department-GETapi-departments-stats">Thống kê department</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-department-GETapi-departments-tree">
                                <a href="#core-department-GETapi-departments-tree">Cây department (toàn bộ cây, không phân trang). Cấu trúc parent_id.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-department-GETapi-departments">
                                <a href="#core-department-GETapi-departments">Danh sách department</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-department-GETapi-departments--department_id-">
                                <a href="#core-department-GETapi-departments--department_id-">Chi tiết department</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-department-POSTapi-departments">
                                <a href="#core-department-POSTapi-departments">Tạo department mới</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-department-PUTapi-departments--department_id-">
                                <a href="#core-department-PUTapi-departments--department_id-">Cập nhật department</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-department-PATCHapi-departments--department_id-">
                                <a href="#core-department-PATCHapi-departments--department_id-">Cập nhật department</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-department-DELETEapi-departments--department_id-">
                                <a href="#core-department-DELETEapi-departments--department_id-">Xóa department</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-department-PATCHapi-departments--department_id--status">
                                <a href="#core-department-PATCHapi-departments--department_id--status">Thay đổi trạng thái department</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-core-logactivity" class="tocify-header">
                <li class="tocify-item level-1" data-unique="core-logactivity">
                    <a href="#core-logactivity">Core - LogActivity</a>
                </li>
                                    <ul id="tocify-subheader-core-logactivity" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="core-logactivity-GETapi-log-activities-export">
                                <a href="#core-logactivity-GETapi-log-activities-export">Xuất danh sách nhật ký</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-logactivity-GETapi-log-activities-stats">
                                <a href="#core-logactivity-GETapi-log-activities-stats">Thống kê nhật ký</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-logactivity-POSTapi-log-activities-delete-by-date">
                                <a href="#core-logactivity-POSTapi-log-activities-delete-by-date">Xóa nhật ký theo khoảng thời gian</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-logactivity-POSTapi-log-activities-clear">
                                <a href="#core-logactivity-POSTapi-log-activities-clear">Xóa toàn bộ nhật ký</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-logactivity-POSTapi-log-activities-bulk-delete">
                                <a href="#core-logactivity-POSTapi-log-activities-bulk-delete">Xóa hàng loạt nhật ký</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-logactivity-GETapi-log-activities">
                                <a href="#core-logactivity-GETapi-log-activities">Danh sách nhật ký</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-logactivity-GETapi-log-activities--logActivity_id-">
                                <a href="#core-logactivity-GETapi-log-activities--logActivity_id-">Chi tiết nhật ký</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-logactivity-DELETEapi-log-activities--logActivity_id-">
                                <a href="#core-logactivity-DELETEapi-log-activities--logActivity_id-">Xóa nhật ký</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-core-permission" class="tocify-header">
                <li class="tocify-item level-1" data-unique="core-permission">
                    <a href="#core-permission">Core - Permission</a>
                </li>
                                    <ul id="tocify-subheader-core-permission" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="core-permission-GETapi-permissions-export">
                                <a href="#core-permission-GETapi-permissions-export">Xuất danh sách permission</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-permission-POSTapi-permissions-import">
                                <a href="#core-permission-POSTapi-permissions-import">Nhập danh sách permission</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-permission-POSTapi-permissions-bulk-delete">
                                <a href="#core-permission-POSTapi-permissions-bulk-delete">Xóa hàng loạt permission</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-permission-GETapi-permissions-stats">
                                <a href="#core-permission-GETapi-permissions-stats">Thống kê permission</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-permission-GETapi-permissions-tree">
                                <a href="#core-permission-GETapi-permissions-tree">Cây permission (toàn bộ cây, không phân trang). Để hiển thị nhóm quyền trên frontend.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-permission-GETapi-permissions">
                                <a href="#core-permission-GETapi-permissions">Danh sách permission</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-permission-GETapi-permissions--permission_id-">
                                <a href="#core-permission-GETapi-permissions--permission_id-">Chi tiết permission</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-permission-POSTapi-permissions">
                                <a href="#core-permission-POSTapi-permissions">Tạo permission mới</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-permission-PUTapi-permissions--permission_id-">
                                <a href="#core-permission-PUTapi-permissions--permission_id-">Cập nhật permission</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-permission-PATCHapi-permissions--permission_id-">
                                <a href="#core-permission-PATCHapi-permissions--permission_id-">Cập nhật permission</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-permission-DELETEapi-permissions--permission_id-">
                                <a href="#core-permission-DELETEapi-permissions--permission_id-">Xóa permission</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-core-role" class="tocify-header">
                <li class="tocify-item level-1" data-unique="core-role">
                    <a href="#core-role">Core - Role</a>
                </li>
                                    <ul id="tocify-subheader-core-role" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="core-role-GETapi-roles-export">
                                <a href="#core-role-GETapi-roles-export">Xuất danh sách role</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-role-POSTapi-roles-import">
                                <a href="#core-role-POSTapi-roles-import">Nhập danh sách role</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-role-POSTapi-roles-bulk-delete">
                                <a href="#core-role-POSTapi-roles-bulk-delete">Xóa hàng loạt role</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-role-GETapi-roles-stats">
                                <a href="#core-role-GETapi-roles-stats">Thống kê role</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-role-GETapi-roles">
                                <a href="#core-role-GETapi-roles">Danh sách role</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-role-GETapi-roles--role_id-">
                                <a href="#core-role-GETapi-roles--role_id-">Chi tiết role</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-role-POSTapi-roles">
                                <a href="#core-role-POSTapi-roles">Tạo role mới</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-role-PUTapi-roles--role_id-">
                                <a href="#core-role-PUTapi-roles--role_id-">Cập nhật role</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-role-PATCHapi-roles--role_id-">
                                <a href="#core-role-PATCHapi-roles--role_id-">Cập nhật role</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-role-DELETEapi-roles--role_id-">
                                <a href="#core-role-DELETEapi-roles--role_id-">Xóa role</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-core-setting" class="tocify-header">
                <li class="tocify-item level-1" data-unique="core-setting">
                    <a href="#core-setting">Core - Setting</a>
                </li>
                                    <ul id="tocify-subheader-core-setting" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="core-setting-GETapi-settings-public">
                                <a href="#core-setting-GETapi-settings-public">Lấy cấu hình công khai</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-setting-GETapi-settings">
                                <a href="#core-setting-GETapi-settings">Lấy toàn bộ cấu hình</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-setting-GETapi-settings--key-">
                                <a href="#core-setting-GETapi-settings--key-">Lấy một key</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-setting-PUTapi-settings">
                                <a href="#core-setting-PUTapi-settings">Cập nhật cấu hình</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-core-user" class="tocify-header">
                <li class="tocify-item level-1" data-unique="core-user">
                    <a href="#core-user">Core - User</a>
                </li>
                                    <ul id="tocify-subheader-core-user" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="core-user-GETapi-users-export">
                                <a href="#core-user-GETapi-users-export">Xuất danh sách người dùng</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-user-POSTapi-users-import">
                                <a href="#core-user-POSTapi-users-import">Nhập danh sách người dùng</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-user-POSTapi-users-bulk-delete">
                                <a href="#core-user-POSTapi-users-bulk-delete">Xóa hàng loạt người dùng</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-user-PATCHapi-users-bulk-status">
                                <a href="#core-user-PATCHapi-users-bulk-status">Cập nhật trạng thái hàng loạt</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-user-GETapi-users-stats">
                                <a href="#core-user-GETapi-users-stats">Thống kê người dùng</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-user-GETapi-users">
                                <a href="#core-user-GETapi-users">Danh sách người dùng</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-user-GETapi-users--user_id-">
                                <a href="#core-user-GETapi-users--user_id-">Chi tiết người dùng</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-user-POSTapi-users">
                                <a href="#core-user-POSTapi-users">Tạo người dùng mới</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-user-PUTapi-users--user_id-">
                                <a href="#core-user-PUTapi-users--user_id-">Cập nhật người dùng</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-user-PATCHapi-users--user_id-">
                                <a href="#core-user-PATCHapi-users--user_id-">Cập nhật người dùng</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-user-DELETEapi-users--user_id-">
                                <a href="#core-user-DELETEapi-users--user_id-">Xóa người dùng</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="core-user-PATCHapi-users--user_id--status">
                                <a href="#core-user-PATCHapi-users--user_id--status">Thay đổi trạng thái người dùng</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-schedule-lich-cong-tac" class="tocify-header">
                <li class="tocify-item level-1" data-unique="schedule-lich-cong-tac">
                    <a href="#schedule-lich-cong-tac">Schedule - Lịch công tác</a>
                </li>
                                    <ul id="tocify-subheader-schedule-lich-cong-tac" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="schedule-lich-cong-tac-GETapi-schedules-public">
                                <a href="#schedule-lich-cong-tac-GETapi-schedules-public">Lịch công tác công khai</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="schedule-lich-cong-tac-GETapi-schedules-export">
                                <a href="#schedule-lich-cong-tac-GETapi-schedules-export">Xuất Excel lịch công tác</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="schedule-lich-cong-tac-GETapi-schedules-export-pdf">
                                <a href="#schedule-lich-cong-tac-GETapi-schedules-export-pdf">Xuất PDF lịch công tác</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="schedule-lich-cong-tac-POSTapi-schedules-import">
                                <a href="#schedule-lich-cong-tac-POSTapi-schedules-import">Nhập Excel lịch công tác</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="schedule-lich-cong-tac-POSTapi-schedules-bulk-delete">
                                <a href="#schedule-lich-cong-tac-POSTapi-schedules-bulk-delete">Xóa hàng loạt lịch công tác</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="schedule-lich-cong-tac-PATCHapi-schedules-bulk-status">
                                <a href="#schedule-lich-cong-tac-PATCHapi-schedules-bulk-status">Cập nhật trạng thái hàng loạt</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="schedule-lich-cong-tac-GETapi-schedules-stats">
                                <a href="#schedule-lich-cong-tac-GETapi-schedules-stats">Thống kê lịch công tác</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="schedule-lich-cong-tac-GETapi-schedules">
                                <a href="#schedule-lich-cong-tac-GETapi-schedules">Danh sách lịch công tác</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="schedule-lich-cong-tac-GETapi-schedules--schedule_id-">
                                <a href="#schedule-lich-cong-tac-GETapi-schedules--schedule_id-">Chi tiết lịch công tác</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="schedule-lich-cong-tac-POSTapi-schedules">
                                <a href="#schedule-lich-cong-tac-POSTapi-schedules">Tạo lịch công tác</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="schedule-lich-cong-tac-PUTapi-schedules--schedule_id-">
                                <a href="#schedule-lich-cong-tac-PUTapi-schedules--schedule_id-">Cập nhật lịch công tác</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="schedule-lich-cong-tac-PATCHapi-schedules--schedule_id-">
                                <a href="#schedule-lich-cong-tac-PATCHapi-schedules--schedule_id-">Cập nhật lịch công tác</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="schedule-lich-cong-tac-DELETEapi-schedules--schedule_id-">
                                <a href="#schedule-lich-cong-tac-DELETEapi-schedules--schedule_id-">Xóa lịch công tác</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="schedule-lich-cong-tac-PATCHapi-schedules--schedule_id--status">
                                <a href="#schedule-lich-cong-tac-PATCHapi-schedules--schedule_id--status">Đổi trạng thái lịch công tác</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="schedule-lich-cong-tac-PATCHapi-schedules--schedule_id--move-up">
                                <a href="#schedule-lich-cong-tac-PATCHapi-schedules--schedule_id--move-up">Di chuyển lịch lên trên</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="schedule-lich-cong-tac-PATCHapi-schedules--schedule_id--move-down">
                                <a href="#schedule-lich-cong-tac-PATCHapi-schedules--schedule_id--move-down">Di chuyển lịch xuống dưới</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="schedule-lich-cong-tac-PATCHapi-schedules--schedule_id--insert-above">
                                <a href="#schedule-lich-cong-tac-PATCHapi-schedules--schedule_id--insert-above">Chèn lịch phía trên bản ghi đích</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="schedule-lich-cong-tac-PATCHapi-schedules--schedule_id--insert-below">
                                <a href="#schedule-lich-cong-tac-PATCHapi-schedules--schedule_id--insert-below">Chèn lịch phía dưới bản ghi đích</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-schedule-thong-bao" class="tocify-header">
                <li class="tocify-item level-1" data-unique="schedule-thong-bao">
                    <a href="#schedule-thong-bao">Schedule - Thông báo</a>
                </li>
                                    <ul id="tocify-subheader-schedule-thong-bao" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="schedule-thong-bao-GETapi-schedule-notifications-unread-count">
                                <a href="#schedule-thong-bao-GETapi-schedule-notifications-unread-count">Số thông báo chưa đọc (badge)</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="schedule-thong-bao-GETapi-schedule-notifications">
                                <a href="#schedule-thong-bao-GETapi-schedule-notifications">Danh sách thông báo</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="schedule-thong-bao-PATCHapi-schedule-notifications--scheduleNotification_id--read">
                                <a href="#schedule-thong-bao-PATCHapi-schedule-notifications--scheduleNotification_id--read">Đánh dấu đã đọc</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="schedule-thong-bao-PATCHapi-schedule-notifications-read-all">
                                <a href="#schedule-thong-bao-PATCHapi-schedule-notifications-read-all">Đánh dấu tất cả đã đọc</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: March 25, 2026</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<p>Quandh Core API - RESTful API cho quản lý xác thực (Auth), người dùng (User) và bài viết (Post). Sử dụng Laravel Sanctum để xác thực Bearer token.</p>
<aside>
    <strong>Base URL</strong>: <code>http://localhost:8000</code>
</aside>
<pre><code>Tài liệu này cung cấp thông tin chi tiết để tích hợp và sử dụng Quandh Core API.

&lt;aside&gt;Khi cuộn xuống, bạn sẽ thấy ví dụ code (Bash, JavaScript, PHP) cho mỗi endpoint. Có thể chọn ngôn ngữ bằng tab góc phải hoặc menu điều hướng trên mobile.&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>To authenticate requests, include an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer Bearer {YOUR_ACCESS_TOKEN}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>Đăng nhập qua <code>POST /api/auth/login</code> với email và password để nhận <code>access_token</code>. Gửi token trong header <code>Authorization: Bearer {token}</code> cho các endpoint cần xác thực.<br><br><strong>X-Department-Id (bắt buộc cho hầu hết endpoint yêu cầu auth):</strong> Các endpoint trong nhóm users, roles, permissions, departments, posts, post-categories, documents, log-activities, settings... cần thêm header <code>X-Department-Id: {department_id}</code> để xác định tổ chức làm việc. Các route <code>/api/auth/*</code> (login, logout, switch-department, forgot-password, reset-password) không cần header này.</p>

        <h1 id="auth">Auth</h1>

    <p>Xác thực: đăng nhập, đăng xuất, quên mật khẩu, đặt lại mật khẩu</p>

                                <h2 id="auth-POSTapi-auth-login">Đăng nhập</h2>

<p>
</p>

<p>Trả về access_token, thông tin user và danh sách department user có thể truy cập.</p>

<span id="example-requests-POSTapi-auth-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/auth/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"admin@example.com\",
    \"password\": \"password\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/auth/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "admin@example.com",
    "password": "password"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/auth/login';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'email' =&gt; 'admin@example.com',
            'password' =&gt; 'password',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-login">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Đăng nhập th&agrave;nh c&ocirc;ng.&quot;,
    &quot;data&quot;: {
        &quot;access_token&quot;: &quot;1|xxx...&quot;,
        &quot;token_type&quot;: &quot;Bearer&quot;,
        &quot;user&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Admin&quot;
        },
        &quot;available_departments&quot;: [
            {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Sở Nội vụ&quot;
            }
        ],
        &quot;current_department_id&quot;: 2,
        &quot;roles&quot;: [
            &quot;admin&quot;
        ],
        &quot;permissions&quot;: [
            &quot;users.index&quot;,
            &quot;users.store&quot;
        ],
        &quot;abilities&quot;: [
            {
                &quot;action&quot;: &quot;index&quot;,
                &quot;subject&quot;: &quot;User&quot;
            },
            {
                &quot;action&quot;: &quot;store&quot;,
                &quot;subject&quot;: &quot;User&quot;
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-auth-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-auth-login" data-method="POST"
      data-path="api/auth/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-login"
                    onclick="tryItOut('POSTapi-auth-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-login"
                    onclick="cancelTryOut('POSTapi-auth-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-auth-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-auth-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-auth-login"
               value="admin@example.com"
               data-component="body">
    <br>
<p>Email hoặc tên đăng nhập (user_name). Example: <code>admin@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-auth-login"
               value="password"
               data-component="body">
    <br>
<p>Mật khẩu. Example: <code>password</code></p>
        </div>
        </form>

                    <h2 id="auth-POSTapi-auth-forgot-password">Quên mật khẩu</h2>

<p>
</p>

<p>Gửi link đặt lại mật khẩu qua email.</p>

<span id="example-requests-POSTapi-auth-forgot-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/auth/forgot-password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"user@example.com\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/auth/forgot-password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "user@example.com"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/auth/forgot-password';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'email' =&gt; 'user@example.com',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-forgot-password">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Link reset đ&atilde; được gửi v&agrave;o Email&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-auth-forgot-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-forgot-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-forgot-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-forgot-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-forgot-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-auth-forgot-password" data-method="POST"
      data-path="api/auth/forgot-password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-forgot-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-forgot-password"
                    onclick="tryItOut('POSTapi-auth-forgot-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-forgot-password"
                    onclick="cancelTryOut('POSTapi-auth-forgot-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-forgot-password"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/forgot-password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-auth-forgot-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-auth-forgot-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-auth-forgot-password"
               value="user@example.com"
               data-component="body">
    <br>
<p>Email tài khoản. Example: <code>user@example.com</code></p>
        </div>
        </form>

                    <h2 id="auth-POSTapi-auth-reset-password">Đặt lại mật khẩu</h2>

<p>
</p>

<p>Đặt mật khẩu mới dùng token từ email reset.</p>

<span id="example-requests-POSTapi-auth-reset-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/auth/reset-password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"user@example.com\",
    \"password\": \"newpassword123\",
    \"password_confirmation\": \"architecto\",
    \"token\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/auth/reset-password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "user@example.com",
    "password": "newpassword123",
    "password_confirmation": "architecto",
    "token": "architecto"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/auth/reset-password';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'email' =&gt; 'user@example.com',
            'password' =&gt; 'newpassword123',
            'password_confirmation' =&gt; 'architecto',
            'token' =&gt; 'architecto',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-reset-password">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Mật khẩu đ&atilde; được đặt lại&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-auth-reset-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-reset-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-reset-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-reset-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-reset-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-auth-reset-password" data-method="POST"
      data-path="api/auth/reset-password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-reset-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-reset-password"
                    onclick="tryItOut('POSTapi-auth-reset-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-reset-password"
                    onclick="cancelTryOut('POSTapi-auth-reset-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-reset-password"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/reset-password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-auth-reset-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-auth-reset-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-auth-reset-password"
               value="user@example.com"
               data-component="body">
    <br>
<p>Email tài khoản. Example: <code>user@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-auth-reset-password"
               value="newpassword123"
               data-component="body">
    <br>
<p>Mật khẩu mới (tối thiểu 6 ký tự, có xác nhận). Example: <code>newpassword123</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password_confirmation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password_confirmation"                data-endpoint="POSTapi-auth-reset-password"
               value="architecto"
               data-component="body">
    <br>
<p>Xác nhận mật khẩu. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>token</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="token"                data-endpoint="POSTapi-auth-reset-password"
               value="architecto"
               data-component="body">
    <br>
<p>Token từ email reset. Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="auth-POSTapi-auth-logout">Đăng xuất</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Hủy token hiện tại.</p>

<span id="example-requests-POSTapi-auth-logout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/auth/logout" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/auth/logout"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/auth/logout';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-logout">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Đ&atilde; đăng xuất&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-auth-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-logout"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-logout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-auth-logout" data-method="POST"
      data-path="api/auth/logout"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-logout"
                    onclick="tryItOut('POSTapi-auth-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-logout"
                    onclick="cancelTryOut('POSTapi-auth-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-logout"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/logout</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-auth-logout"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-auth-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-auth-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="auth-POSTapi-auth-switch-department">Chuyển đơn vị làm việc</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Chọn department để frontend gắn vào header <code>X-Department-Id</code> cho các request tiếp theo.</p>

<span id="example-requests-POSTapi-auth-switch-department">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/auth/switch-department" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"department_id\": 2
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/auth/switch-department"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "department_id": 2
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/auth/switch-department';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'department_id' =&gt; 2,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-switch-department">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Đ&atilde; chuyển đơn vị l&agrave;m việc.&quot;,
    &quot;data&quot;: {
        &quot;current_department_id&quot;: 2,
        &quot;current_department&quot;: {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Sở Nội vụ&quot;
        },
        &quot;roles&quot;: [
            &quot;admin&quot;
        ],
        &quot;permissions&quot;: [
            &quot;users.index&quot;,
            &quot;users.store&quot;
        ],
        &quot;abilities&quot;: [
            {
                &quot;action&quot;: &quot;index&quot;,
                &quot;subject&quot;: &quot;User&quot;
            },
            {
                &quot;action&quot;: &quot;store&quot;,
                &quot;subject&quot;: &quot;User&quot;
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-auth-switch-department" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-switch-department"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-switch-department"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-switch-department" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-switch-department">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-auth-switch-department" data-method="POST"
      data-path="api/auth/switch-department"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-switch-department', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-switch-department"
                    onclick="tryItOut('POSTapi-auth-switch-department');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-switch-department"
                    onclick="cancelTryOut('POSTapi-auth-switch-department');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-switch-department"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/switch-department</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-auth-switch-department"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-auth-switch-department"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-auth-switch-department"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>department_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="department_id"                data-endpoint="POSTapi-auth-switch-department"
               value="2"
               data-component="body">
    <br>
<p>ID đơn vị muốn chuyển. Example: <code>2</code></p>
        </div>
        </form>

                    <h2 id="auth-GETapi-user">Lấy thông tin user đăng nhập hiện tại kèm roles và permissions của đơn vị đang chọn.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Dùng để Vue Casl khởi tạo ability khi refresh trang. Cần header X-Department-Id (middleware set.permissions.team đã đặt ngữ cảnh).</p>

<span id="example-requests-GETapi-user">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/user" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/user"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/user';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-user">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;user&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Admin&quot;
        },
        &quot;roles&quot;: [
            &quot;admin&quot;
        ],
        &quot;permissions&quot;: [
            &quot;users.index&quot;,
            &quot;users.store&quot;
        ],
        &quot;abilities&quot;: [
            {
                &quot;action&quot;: &quot;index&quot;,
                &quot;subject&quot;: &quot;User&quot;
            },
            {
                &quot;action&quot;: &quot;store&quot;,
                &quot;subject&quot;: &quot;User&quot;
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-user" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-user"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-user" data-method="GET"
      data-path="api/user"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-user', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-user"
                    onclick="tryItOut('GETapi-user');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-user"
                    onclick="cancelTryOut('GETapi-user');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-user"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/user</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-user"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="core-department">Core - Department</h1>

    

                                <h2 id="core-department-GETapi-departments-public">Danh sách department công khai</h2>

<p>
</p>

<p>Trả về danh sách department đang hoạt động (active), thứ tự theo cây, dùng cho các chức năng công khai.</p>

<span id="example-requests-GETapi-departments-public">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/departments/public?search=cong-ty&amp;status=active&amp;from_date=2026-01-01&amp;to_date=2026-12-31&amp;sort_by=created_at&amp;sort_order=desc&amp;limit=10" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/departments/public"
);

const params = {
    "search": "cong-ty",
    "status": "active",
    "from_date": "2026-01-01",
    "to_date": "2026-12-31",
    "sort_by": "created_at",
    "sort_order": "desc",
    "limit": "10",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/departments/public';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'search' =&gt; 'cong-ty',
            'status' =&gt; 'active',
            'from_date' =&gt; '2026-01-01',
            'to_date' =&gt; '2026-12-31',
            'sort_by' =&gt; 'created_at',
            'sort_order' =&gt; 'desc',
            'limit' =&gt; '10',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-departments-public">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 66,
            &quot;name&quot;: &quot;Bailey Inc&quot;,
            &quot;slug&quot;: &quot;quos-velit-et-fugiat-sunt-nihil-accusantium-harum&quot;,
            &quot;description&quot;: null,
            &quot;status&quot;: &quot;active&quot;,
            &quot;parent_id&quot;: null,
            &quot;sort_order&quot;: 7,
            &quot;depth&quot;: 0,
            &quot;created_by&quot;: &quot;N/A&quot;,
            &quot;updated_by&quot;: &quot;N/A&quot;,
            &quot;created_at&quot;: &quot;03:43:47 25/03/2026&quot;,
            &quot;updated_at&quot;: &quot;03:43:47 25/03/2026&quot;
        },
        {
            &quot;id&quot;: 67,
            &quot;name&quot;: &quot;DuBuque Inc&quot;,
            &quot;slug&quot;: &quot;quo-omnis-nostrum-aut-adipisci&quot;,
            &quot;description&quot;: &quot;Qui commodi incidunt iure odit.&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;parent_id&quot;: null,
            &quot;sort_order&quot;: 20,
            &quot;depth&quot;: 0,
            &quot;created_by&quot;: &quot;N/A&quot;,
            &quot;updated_by&quot;: &quot;N/A&quot;,
            &quot;created_at&quot;: &quot;03:43:47 25/03/2026&quot;,
            &quot;updated_at&quot;: &quot;03:43:47 25/03/2026&quot;
        }
    ],
    &quot;success&quot;: &quot;true&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-departments-public" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-departments-public"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-departments-public"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-departments-public" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-departments-public">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-departments-public" data-method="GET"
      data-path="api/departments/public"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-departments-public', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-departments-public"
                    onclick="tryItOut('GETapi-departments-public');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-departments-public"
                    onclick="cancelTryOut('GETapi-departments-public');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-departments-public"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/departments/public</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="GETapi-departments-public"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-departments-public"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-departments-public"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-departments-public"
               value="cong-ty"
               data-component="query">
    <br>
<p>Từ khóa tìm kiếm (name, slug). Example: <code>cong-ty</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="GETapi-departments-public"
               value="active"
               data-component="query">
    <br>
<p>Lọc theo trạng thái. Example: <code>active</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>from_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="from_date"                data-endpoint="GETapi-departments-public"
               value="2026-01-01"
               data-component="query">
    <br>
<p>Lọc từ ngày tạo (Y-m-d). Must be a valid date. Example: <code>2026-01-01</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>to_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="to_date"                data-endpoint="GETapi-departments-public"
               value="2026-12-31"
               data-component="query">
    <br>
<p>Lọc đến ngày tạo (Y-m-d). Must be a valid date. Must be a date after or equal to <code>from_date</code>. Example: <code>2026-12-31</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_by</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_by"                data-endpoint="GETapi-departments-public"
               value="created_at"
               data-component="query">
    <br>
<p>Trường dùng để sắp xếp. Must not be greater than 50 characters. Example: <code>created_at</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_order</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_order"                data-endpoint="GETapi-departments-public"
               value="desc"
               data-component="query">
    <br>
<p>Thứ tự sắp xếp. Example: <code>desc</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>asc</code></li> <li><code>desc</code></li></ul>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETapi-departments-public"
               value="10"
               data-component="query">
    <br>
<p>Số bản ghi mỗi trang (1-100). Must be at least 1. Must not be greater than 100. Example: <code>10</code></p>
            </div>
                </form>

                    <h2 id="core-department-GETapi-departments-public-options">Danh sách department công khai cho dropdown</h2>

<p>
</p>

<p>Trả về dữ liệu tối giản chỉ gồm id, name, description để tối ưu payload cho dropdown.</p>

<span id="example-requests-GETapi-departments-public-options">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/departments/public-options?search=cong-ty&amp;status=active&amp;from_date=2026-01-01&amp;to_date=2026-12-31&amp;sort_by=created_at&amp;sort_order=desc&amp;limit=10" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/departments/public-options"
);

const params = {
    "search": "cong-ty",
    "status": "active",
    "from_date": "2026-01-01",
    "to_date": "2026-12-31",
    "sort_by": "created_at",
    "sort_order": "desc",
    "limit": "10",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/departments/public-options';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'search' =&gt; 'cong-ty',
            'status' =&gt; 'active',
            'from_date' =&gt; '2026-01-01',
            'to_date' =&gt; '2026-12-31',
            'sort_by' =&gt; 'created_at',
            'sort_order' =&gt; 'desc',
            'limit' =&gt; '10',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-departments-public-options">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 68,
            &quot;name&quot;: &quot;Okuneva, Rempel and Gulgowski&quot;,
            &quot;description&quot;: null
        },
        {
            &quot;id&quot;: 69,
            &quot;name&quot;: &quot;Cormier Inc&quot;,
            &quot;description&quot;: &quot;Odit et et modi.&quot;
        }
    ],
    &quot;success&quot;: &quot;true&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-departments-public-options" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-departments-public-options"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-departments-public-options"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-departments-public-options" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-departments-public-options">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-departments-public-options" data-method="GET"
      data-path="api/departments/public-options"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-departments-public-options', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-departments-public-options"
                    onclick="tryItOut('GETapi-departments-public-options');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-departments-public-options"
                    onclick="cancelTryOut('GETapi-departments-public-options');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-departments-public-options"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/departments/public-options</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="GETapi-departments-public-options"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-departments-public-options"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-departments-public-options"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-departments-public-options"
               value="cong-ty"
               data-component="query">
    <br>
<p>Từ khóa tìm kiếm (name, slug). Example: <code>cong-ty</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="GETapi-departments-public-options"
               value="active"
               data-component="query">
    <br>
<p>Lọc theo trạng thái. Example: <code>active</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>from_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="from_date"                data-endpoint="GETapi-departments-public-options"
               value="2026-01-01"
               data-component="query">
    <br>
<p>Lọc từ ngày tạo (Y-m-d). Must be a valid date. Example: <code>2026-01-01</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>to_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="to_date"                data-endpoint="GETapi-departments-public-options"
               value="2026-12-31"
               data-component="query">
    <br>
<p>Lọc đến ngày tạo (Y-m-d). Must be a valid date. Must be a date after or equal to <code>from_date</code>. Example: <code>2026-12-31</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_by</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_by"                data-endpoint="GETapi-departments-public-options"
               value="created_at"
               data-component="query">
    <br>
<p>Trường dùng để sắp xếp. Must not be greater than 50 characters. Example: <code>created_at</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_order</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_order"                data-endpoint="GETapi-departments-public-options"
               value="desc"
               data-component="query">
    <br>
<p>Thứ tự sắp xếp. Example: <code>desc</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>asc</code></li> <li><code>desc</code></li></ul>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETapi-departments-public-options"
               value="10"
               data-component="query">
    <br>
<p>Số bản ghi mỗi trang (1-100). Must be at least 1. Must not be greater than 100. Example: <code>10</code></p>
            </div>
                </form>

                    <h2 id="core-department-GETapi-departments-export">Xuất danh sách department</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Áp dụng cùng bộ lọc với index. Xuất ra các trường: id, name, slug, description, status, parent_id, parent_slug, sort_order, depth, created_by, updated_by, created_at, updated_at.</p>

<span id="example-requests-GETapi-departments-export">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/departments/export?search=architecto&amp;status=architecto&amp;from_date=architecto&amp;to_date=architecto&amp;sort_by=architecto&amp;sort_order=architecto&amp;limit=10" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/departments/export"
);

const params = {
    "search": "architecto",
    "status": "architecto",
    "from_date": "architecto",
    "to_date": "architecto",
    "sort_by": "architecto",
    "sort_order": "architecto",
    "limit": "10",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/departments/export';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'search' =&gt; 'architecto',
            'status' =&gt; 'architecto',
            'from_date' =&gt; 'architecto',
            'to_date' =&gt; 'architecto',
            'sort_by' =&gt; 'architecto',
            'sort_order' =&gt; 'architecto',
            'limit' =&gt; '10',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-departments-export">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-departments-export" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-departments-export"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-departments-export"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-departments-export" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-departments-export">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-departments-export" data-method="GET"
      data-path="api/departments/export"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-departments-export', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-departments-export"
                    onclick="tryItOut('GETapi-departments-export');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-departments-export"
                    onclick="cancelTryOut('GETapi-departments-export');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-departments-export"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/departments/export</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-departments-export"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="GETapi-departments-export"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-departments-export"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-departments-export"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-departments-export"
               value="architecto"
               data-component="query">
    <br>
<p>Từ khóa tìm kiếm (name, slug). Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="GETapi-departments-export"
               value="architecto"
               data-component="query">
    <br>
<p>Lọc theo trạng thái: active, inactive. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>from_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="from_date"                data-endpoint="GETapi-departments-export"
               value="architecto"
               data-component="query">
    <br>
<p>date Lọc từ ngày tạo (created_at) (Y-m-d). Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>to_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="to_date"                data-endpoint="GETapi-departments-export"
               value="architecto"
               data-component="query">
    <br>
<p>date Lọc đến ngày tạo (created_at) (Y-m-d). Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_by</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_by"                data-endpoint="GETapi-departments-export"
               value="architecto"
               data-component="query">
    <br>
<p>Sắp xếp theo: id, name, slug, status, created_at, updated_at. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_order</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_order"                data-endpoint="GETapi-departments-export"
               value="architecto"
               data-component="query">
    <br>
<p>Thứ tự: asc, desc. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETapi-departments-export"
               value="10"
               data-component="query">
    <br>
<p>Số bản ghi mỗi trang (1-100). Must be at least 1. Must not be greater than 100. Example: <code>10</code></p>
            </div>
                </form>

                    <h2 id="core-department-POSTapi-departments-import">Nhập danh sách department</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Cột bắt buộc: name. Cột không bắt buộc: slug, description, status (mặc định "active"), parent_id.</p>

<span id="example-requests-POSTapi-departments-import">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/departments/import" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "file=@/tmp/phprll730mdv1em0bum0xf" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/departments/import"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('file', document.querySelector('input[name="file"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/departments/import';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'multipart/form-data',
            'Accept' =&gt; 'application/json',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'file',
                'contents' =&gt; fopen('/tmp/phprll730mdv1em0bum0xf', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-departments-import">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Import department th&agrave;nh c&ocirc;ng.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-departments-import" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-departments-import"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-departments-import"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-departments-import" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-departments-import">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-departments-import" data-method="POST"
      data-path="api/departments/import"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-departments-import', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-departments-import"
                    onclick="tryItOut('POSTapi-departments-import');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-departments-import"
                    onclick="cancelTryOut('POSTapi-departments-import');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-departments-import"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/departments/import</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-departments-import"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="POSTapi-departments-import"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-departments-import"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-departments-import"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>file</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="file"                data-endpoint="POSTapi-departments-import"
               value=""
               data-component="body">
    <br>
<p>File Excel (xlsx, xls, csv). Cột theo chuẩn export. Example: <code>/tmp/phprll730mdv1em0bum0xf</code></p>
        </div>
        </form>

                    <h2 id="core-department-POSTapi-departments-bulk-delete">Xóa hàng loạt department</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-departments-bulk-delete">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/departments/bulk-delete" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"ids\": [
        1,
        2,
        3
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/departments/bulk-delete"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "ids": [
        1,
        2,
        3
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/departments/bulk-delete';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'ids' =&gt; [
                1,
                2,
                3,
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-departments-bulk-delete">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Đ&atilde; x&oacute;a th&agrave;nh c&ocirc;ng c&aacute;c department được chọn!&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-departments-bulk-delete" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-departments-bulk-delete"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-departments-bulk-delete"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-departments-bulk-delete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-departments-bulk-delete">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-departments-bulk-delete" data-method="POST"
      data-path="api/departments/bulk-delete"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-departments-bulk-delete', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-departments-bulk-delete"
                    onclick="tryItOut('POSTapi-departments-bulk-delete');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-departments-bulk-delete"
                    onclick="cancelTryOut('POSTapi-departments-bulk-delete');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-departments-bulk-delete"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/departments/bulk-delete</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-departments-bulk-delete"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="POSTapi-departments-bulk-delete"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-departments-bulk-delete"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-departments-bulk-delete"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ids</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ids[0]"                data-endpoint="POSTapi-departments-bulk-delete"
               data-component="body">
        <input type="text" style="display: none"
               name="ids[1]"                data-endpoint="POSTapi-departments-bulk-delete"
               data-component="body">
    <br>
<p>Danh sách ID.</p>
        </div>
        </form>

                    <h2 id="core-department-PATCHapi-departments-bulk-status">Cập nhật trạng thái department hàng loạt</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PATCHapi-departments-bulk-status">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost:8000/api/departments/bulk-status" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"ids\": [
        1,
        2,
        3
    ],
    \"status\": \"active\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/departments/bulk-status"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "ids": [
        1,
        2,
        3
    ],
    "status": "active"
};

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/departments/bulk-status';
$response = $client-&gt;patch(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'ids' =&gt; [
                1,
                2,
                3,
            ],
            'status' =&gt; 'active',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-PATCHapi-departments-bulk-status">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Cập nhật trạng th&aacute;i department th&agrave;nh c&ocirc;ng.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PATCHapi-departments-bulk-status" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-departments-bulk-status"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-departments-bulk-status"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHapi-departments-bulk-status" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-departments-bulk-status">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHapi-departments-bulk-status" data-method="PATCH"
      data-path="api/departments/bulk-status"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-departments-bulk-status', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-departments-bulk-status"
                    onclick="tryItOut('PATCHapi-departments-bulk-status');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-departments-bulk-status"
                    onclick="cancelTryOut('PATCHapi-departments-bulk-status');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-departments-bulk-status"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/departments/bulk-status</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PATCHapi-departments-bulk-status"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="PATCHapi-departments-bulk-status"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHapi-departments-bulk-status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHapi-departments-bulk-status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ids</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ids[0]"                data-endpoint="PATCHapi-departments-bulk-status"
               data-component="body">
        <input type="text" style="display: none"
               name="ids[1]"                data-endpoint="PATCHapi-departments-bulk-status"
               data-component="body">
    <br>
<p>Danh sách ID.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PATCHapi-departments-bulk-status"
               value="active"
               data-component="body">
    <br>
<p>Trạng thái: active, inactive. Example: <code>active</code></p>
        </div>
        </form>

                    <h2 id="core-department-GETapi-departments-stats">Thống kê department</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Tổng số, đang kích hoạt (active), không kích hoạt (inactive). Áp dụng cùng bộ lọc với index.</p>

<span id="example-requests-GETapi-departments-stats">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/departments/stats?search=cong-ty&amp;status=architecto&amp;from_date=2026-02-01&amp;to_date=2026-02-17&amp;sort_by=created_at&amp;sort_order=desc&amp;limit=10" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/departments/stats"
);

const params = {
    "search": "cong-ty",
    "status": "architecto",
    "from_date": "2026-02-01",
    "to_date": "2026-02-17",
    "sort_by": "created_at",
    "sort_order": "desc",
    "limit": "10",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/departments/stats';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'search' =&gt; 'cong-ty',
            'status' =&gt; 'architecto',
            'from_date' =&gt; '2026-02-01',
            'to_date' =&gt; '2026-02-17',
            'sort_by' =&gt; 'created_at',
            'sort_order' =&gt; 'desc',
            'limit' =&gt; '10',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-departments-stats">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;total&quot;: 10,
        &quot;active&quot;: 5,
        &quot;inactive&quot;: 5
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-departments-stats" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-departments-stats"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-departments-stats"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-departments-stats" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-departments-stats">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-departments-stats" data-method="GET"
      data-path="api/departments/stats"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-departments-stats', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-departments-stats"
                    onclick="tryItOut('GETapi-departments-stats');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-departments-stats"
                    onclick="cancelTryOut('GETapi-departments-stats');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-departments-stats"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/departments/stats</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-departments-stats"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="GETapi-departments-stats"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-departments-stats"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-departments-stats"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-departments-stats"
               value="cong-ty"
               data-component="query">
    <br>
<p>Từ khóa tìm kiếm (name, slug). Example: <code>cong-ty</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="GETapi-departments-stats"
               value="architecto"
               data-component="query">
    <br>
<p>Lọc theo trạng thái: active, inactive. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>from_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="from_date"                data-endpoint="GETapi-departments-stats"
               value="2026-02-01"
               data-component="query">
    <br>
<p>date Lọc từ ngày tạo (created_at) (Y-m-d). Example: <code>2026-02-01</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>to_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="to_date"                data-endpoint="GETapi-departments-stats"
               value="2026-02-17"
               data-component="query">
    <br>
<p>date Lọc đến ngày tạo (created_at) (Y-m-d). Example: <code>2026-02-17</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_by</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_by"                data-endpoint="GETapi-departments-stats"
               value="created_at"
               data-component="query">
    <br>
<p>Sắp xếp theo: id, name, slug, status, created_at, updated_at. Example: <code>created_at</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_order</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_order"                data-endpoint="GETapi-departments-stats"
               value="desc"
               data-component="query">
    <br>
<p>Thứ tự: asc, desc. Example: <code>desc</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETapi-departments-stats"
               value="10"
               data-component="query">
    <br>
<p>Số bản ghi mỗi trang (1-100). Example: <code>10</code></p>
            </div>
                </form>

                    <h2 id="core-department-GETapi-departments-tree">Cây department (toàn bộ cây, không phân trang). Cấu trúc parent_id.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-departments-tree">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/departments/tree?status=architecto" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/departments/tree"
);

const params = {
    "status": "architecto",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/departments/tree';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'status' =&gt; 'architecto',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-departments-tree">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;C&ocirc;ng ty A&quot;,
            &quot;slug&quot;: &quot;cong-ty-a&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;parent_id&quot;: null,
            &quot;children&quot;: []
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-departments-tree" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-departments-tree"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-departments-tree"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-departments-tree" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-departments-tree">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-departments-tree" data-method="GET"
      data-path="api/departments/tree"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-departments-tree', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-departments-tree"
                    onclick="tryItOut('GETapi-departments-tree');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-departments-tree"
                    onclick="cancelTryOut('GETapi-departments-tree');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-departments-tree"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/departments/tree</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-departments-tree"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="GETapi-departments-tree"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-departments-tree"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-departments-tree"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="GETapi-departments-tree"
               value="architecto"
               data-component="query">
    <br>
<p>Lọc theo trạng thái: active, inactive. Example: <code>architecto</code></p>
            </div>
                </form>

                    <h2 id="core-department-GETapi-departments">Danh sách department</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Lấy danh sách có phân trang, lọc và sắp xếp.</p>

<span id="example-requests-GETapi-departments">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/departments?search=cong-ty&amp;status=architecto&amp;from_date=2026-02-01&amp;to_date=2026-02-17&amp;sort_by=id&amp;sort_order=desc&amp;limit=10" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/departments"
);

const params = {
    "search": "cong-ty",
    "status": "architecto",
    "from_date": "2026-02-01",
    "to_date": "2026-02-17",
    "sort_by": "id",
    "sort_order": "desc",
    "limit": "10",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/departments';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'search' =&gt; 'cong-ty',
            'status' =&gt; 'architecto',
            'from_date' =&gt; '2026-02-01',
            'to_date' =&gt; '2026-02-17',
            'sort_by' =&gt; 'id',
            'sort_order' =&gt; 'desc',
            'limit' =&gt; '10',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-departments">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 71,
            &quot;name&quot;: &quot;Bailey Ltd&quot;,
            &quot;slug&quot;: &quot;velit-et-fugiat-sunt-nihil-accusantium&quot;,
            &quot;description&quot;: &quot;Modi deserunt aut ab provident perspiciatis.&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;parent_id&quot;: null,
            &quot;sort_order&quot;: 23,
            &quot;depth&quot;: 0,
            &quot;created_by&quot;: &quot;N/A&quot;,
            &quot;updated_by&quot;: &quot;N/A&quot;,
            &quot;created_at&quot;: &quot;03:43:48 25/03/2026&quot;,
            &quot;updated_at&quot;: &quot;03:43:48 25/03/2026&quot;
        },
        {
            &quot;id&quot;: 72,
            &quot;name&quot;: &quot;Marquardt Inc&quot;,
            &quot;slug&quot;: &quot;nostrum-qui-commodi-incidunt-iure&quot;,
            &quot;description&quot;: null,
            &quot;status&quot;: &quot;active&quot;,
            &quot;parent_id&quot;: null,
            &quot;sort_order&quot;: 20,
            &quot;depth&quot;: 0,
            &quot;created_by&quot;: &quot;N/A&quot;,
            &quot;updated_by&quot;: &quot;N/A&quot;,
            &quot;created_at&quot;: &quot;03:43:48 25/03/2026&quot;,
            &quot;updated_at&quot;: &quot;03:43:48 25/03/2026&quot;
        }
    ],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;/?page=1&quot;,
        &quot;last&quot;: &quot;/?page=1&quot;,
        &quot;prev&quot;: null,
        &quot;next&quot;: null
    },
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 1,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;/?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;page&quot;: 1,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;/&quot;,
        &quot;per_page&quot;: 10,
        &quot;to&quot;: 2,
        &quot;total&quot;: 2
    },
    &quot;success&quot;: &quot;true&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-departments" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-departments"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-departments"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-departments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-departments">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-departments" data-method="GET"
      data-path="api/departments"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-departments', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-departments"
                    onclick="tryItOut('GETapi-departments');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-departments"
                    onclick="cancelTryOut('GETapi-departments');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-departments"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/departments</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-departments"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="GETapi-departments"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-departments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-departments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-departments"
               value="cong-ty"
               data-component="query">
    <br>
<p>Từ khóa tìm kiếm (name, slug). Example: <code>cong-ty</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="GETapi-departments"
               value="architecto"
               data-component="query">
    <br>
<p>Lọc theo trạng thái: active, inactive. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>from_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="from_date"                data-endpoint="GETapi-departments"
               value="2026-02-01"
               data-component="query">
    <br>
<p>date Lọc từ ngày tạo (created_at) (Y-m-d). Example: <code>2026-02-01</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>to_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="to_date"                data-endpoint="GETapi-departments"
               value="2026-02-17"
               data-component="query">
    <br>
<p>date Lọc đến ngày tạo (created_at) (Y-m-d). Example: <code>2026-02-17</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_by</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_by"                data-endpoint="GETapi-departments"
               value="id"
               data-component="query">
    <br>
<p>Sắp xếp theo: id, name, slug, status, created_at, updated_at. Example: <code>id</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_order</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_order"                data-endpoint="GETapi-departments"
               value="desc"
               data-component="query">
    <br>
<p>Thứ tự: asc, desc. Example: <code>desc</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETapi-departments"
               value="10"
               data-component="query">
    <br>
<p>Số bản ghi mỗi trang (1-100). Example: <code>10</code></p>
            </div>
                </form>

                    <h2 id="core-department-GETapi-departments--department_id-">Chi tiết department</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-departments--department_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/departments/1" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/departments/1"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/departments/1';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-departments--department_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 74,
        &quot;name&quot;: &quot;Price Ltd&quot;,
        &quot;slug&quot;: &quot;qui-commodi-incidunt-iure-odit&quot;,
        &quot;description&quot;: &quot;Modi ipsum nostrum omnis autem et.&quot;,
        &quot;status&quot;: &quot;inactive&quot;,
        &quot;parent_id&quot;: 73,
        &quot;sort_order&quot;: 84,
        &quot;depth&quot;: 1,
        &quot;created_by&quot;: &quot;N/A&quot;,
        &quot;updated_by&quot;: &quot;N/A&quot;,
        &quot;created_at&quot;: &quot;03:43:48 25/03/2026&quot;,
        &quot;updated_at&quot;: &quot;03:43:48 25/03/2026&quot;,
        &quot;parent&quot;: {
            &quot;id&quot;: 73,
            &quot;name&quot;: &quot;Stokes and Sons&quot;,
            &quot;slug&quot;: &quot;tempora-ex-voluptatem-laboriosam-praesentium-quis&quot;,
            &quot;description&quot;: &quot;Fugit deleniti distinctio eum doloremque id aut libero.&quot;,
            &quot;status&quot;: &quot;inactive&quot;,
            &quot;parent_id&quot;: null,
            &quot;sort_order&quot;: 49,
            &quot;depth&quot;: 0,
            &quot;created_by&quot;: &quot;N/A&quot;,
            &quot;updated_by&quot;: &quot;N/A&quot;,
            &quot;created_at&quot;: &quot;03:43:48 25/03/2026&quot;,
            &quot;updated_at&quot;: &quot;03:43:48 25/03/2026&quot;
        },
        &quot;children&quot;: [
            {
                &quot;id&quot;: 75,
                &quot;name&quot;: &quot;Kutch and Sons&quot;,
                &quot;slug&quot;: &quot;nemo-odit-quia-officia-est-dignissimos&quot;,
                &quot;description&quot;: null,
                &quot;status&quot;: &quot;inactive&quot;,
                &quot;parent_id&quot;: 74,
                &quot;sort_order&quot;: 6,
                &quot;depth&quot;: 2,
                &quot;created_by&quot;: &quot;N/A&quot;,
                &quot;updated_by&quot;: &quot;N/A&quot;,
                &quot;created_at&quot;: &quot;03:43:48 25/03/2026&quot;,
                &quot;updated_at&quot;: &quot;03:43:48 25/03/2026&quot;
            }
        ]
    },
    &quot;success&quot;: &quot;true&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-departments--department_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-departments--department_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-departments--department_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-departments--department_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-departments--department_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-departments--department_id-" data-method="GET"
      data-path="api/departments/{department_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-departments--department_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-departments--department_id-"
                    onclick="tryItOut('GETapi-departments--department_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-departments--department_id-"
                    onclick="cancelTryOut('GETapi-departments--department_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-departments--department_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/departments/{department_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-departments--department_id-"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="GETapi-departments--department_id-"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-departments--department_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-departments--department_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>department_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="department_id"                data-endpoint="GETapi-departments--department_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the department. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>department</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="department"                data-endpoint="GETapi-departments--department_id-"
               value="1"
               data-component="url">
    <br>
<p>ID department. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="core-department-POSTapi-departments">Tạo department mới</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-departments">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/departments" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Công ty A\",
    \"slug\": \"cong-ty-a\",
    \"description\": \"Tổ chức quản trị\",
    \"status\": \"active\",
    \"parent_id\": null,
    \"sort_order\": 0
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/departments"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Công ty A",
    "slug": "cong-ty-a",
    "description": "Tổ chức quản trị",
    "status": "active",
    "parent_id": null,
    "sort_order": 0
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/departments';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'Công ty A',
            'slug' =&gt; 'cong-ty-a',
            'description' =&gt; 'Tổ chức quản trị',
            'status' =&gt; 'active',
            'parent_id' =&gt; null,
            'sort_order' =&gt; 0,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-departments">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 76,
        &quot;name&quot;: &quot;Dach-Gaylord&quot;,
        &quot;slug&quot;: &quot;mollitia-modi-deserunt-aut-ab-provident-perspiciatis-quo&quot;,
        &quot;description&quot;: null,
        &quot;status&quot;: &quot;active&quot;,
        &quot;parent_id&quot;: null,
        &quot;sort_order&quot;: 49,
        &quot;depth&quot;: 0,
        &quot;created_by&quot;: &quot;N/A&quot;,
        &quot;updated_by&quot;: &quot;N/A&quot;,
        &quot;created_at&quot;: &quot;03:43:48 25/03/2026&quot;,
        &quot;updated_at&quot;: &quot;03:43:48 25/03/2026&quot;
    },
    &quot;success&quot;: &quot;true&quot;,
    &quot;message&quot;: &quot;Department đ&atilde; được tạo th&agrave;nh c&ocirc;ng!&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-departments" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-departments"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-departments"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-departments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-departments">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-departments" data-method="POST"
      data-path="api/departments"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-departments', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-departments"
                    onclick="tryItOut('POSTapi-departments');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-departments"
                    onclick="cancelTryOut('POSTapi-departments');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-departments"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/departments</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-departments"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="POSTapi-departments"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-departments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-departments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-departments"
               value="Công ty A"
               data-component="body">
    <br>
<p>Tên department. Example: <code>Công ty A</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="POSTapi-departments"
               value="cong-ty-a"
               data-component="body">
    <br>
<p>Slug (nếu không gửi sẽ tự sinh từ name). Example: <code>cong-ty-a</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-departments"
               value="Tổ chức quản trị"
               data-component="body">
    <br>
<p>Mô tả. Example: <code>Tổ chức quản trị</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="POSTapi-departments"
               value="active"
               data-component="body">
    <br>
<p>Trạng thái: active, inactive. Example: <code>active</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>parent_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="parent_id"                data-endpoint="POSTapi-departments"
               value=""
               data-component="body">
    <br>
<p>ID department cha (null = gốc).</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sort_order</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="sort_order"                data-endpoint="POSTapi-departments"
               value="0"
               data-component="body">
    <br>
<p>Thứ tự. Example: <code>0</code></p>
        </div>
        </form>

                    <h2 id="core-department-PUTapi-departments--department_id-">Cập nhật department</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-departments--department_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/departments/1" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Công ty A\",
    \"slug\": \"cong-ty-a\",
    \"description\": \"Tổ chức quản trị\",
    \"status\": \"inactive\",
    \"parent_id\": null,
    \"sort_order\": 0
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/departments/1"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Công ty A",
    "slug": "cong-ty-a",
    "description": "Tổ chức quản trị",
    "status": "inactive",
    "parent_id": null,
    "sort_order": 0
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/departments/1';
$response = $client-&gt;put(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'Công ty A',
            'slug' =&gt; 'cong-ty-a',
            'description' =&gt; 'Tổ chức quản trị',
            'status' =&gt; 'inactive',
            'parent_id' =&gt; null,
            'sort_order' =&gt; 0,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-PUTapi-departments--department_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 78,
        &quot;name&quot;: &quot;Tillman-Runte&quot;,
        &quot;slug&quot;: &quot;aut-ab-provident-perspiciatis-quo-omnis-nostrum-aut&quot;,
        &quot;description&quot;: &quot;Nostrum qui commodi incidunt iure.&quot;,
        &quot;status&quot;: &quot;inactive&quot;,
        &quot;parent_id&quot;: 77,
        &quot;sort_order&quot;: 45,
        &quot;depth&quot;: 1,
        &quot;created_by&quot;: &quot;N/A&quot;,
        &quot;updated_by&quot;: &quot;N/A&quot;,
        &quot;created_at&quot;: &quot;03:43:48 25/03/2026&quot;,
        &quot;updated_at&quot;: &quot;03:43:48 25/03/2026&quot;,
        &quot;parent&quot;: {
            &quot;id&quot;: 77,
            &quot;name&quot;: &quot;Bauch, Fritsch and O&#039;Keefe&quot;,
            &quot;slug&quot;: &quot;autem-et-consequatur-aut-dolores-enim-non-facere-tempora&quot;,
            &quot;description&quot;: &quot;Laboriosam praesentium quis adipisci molestias fugit deleniti distinctio.&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;parent_id&quot;: null,
            &quot;sort_order&quot;: 35,
            &quot;depth&quot;: 0,
            &quot;created_by&quot;: &quot;N/A&quot;,
            &quot;updated_by&quot;: &quot;N/A&quot;,
            &quot;created_at&quot;: &quot;03:43:48 25/03/2026&quot;,
            &quot;updated_at&quot;: &quot;03:43:48 25/03/2026&quot;
        },
        &quot;children&quot;: [
            {
                &quot;id&quot;: 79,
                &quot;name&quot;: &quot;Ankunding PLC&quot;,
                &quot;slug&quot;: &quot;veniam-corporis-dolorem-mollitia&quot;,
                &quot;description&quot;: &quot;Odit quia officia est dignissimos neque blanditiis odio.&quot;,
                &quot;status&quot;: &quot;inactive&quot;,
                &quot;parent_id&quot;: 78,
                &quot;sort_order&quot;: 16,
                &quot;depth&quot;: 2,
                &quot;created_by&quot;: &quot;N/A&quot;,
                &quot;updated_by&quot;: &quot;N/A&quot;,
                &quot;created_at&quot;: &quot;03:43:48 25/03/2026&quot;,
                &quot;updated_at&quot;: &quot;03:43:48 25/03/2026&quot;
            }
        ]
    },
    &quot;success&quot;: &quot;true&quot;,
    &quot;message&quot;: &quot;Department đ&atilde; được cập nhật!&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-departments--department_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-departments--department_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-departments--department_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-departments--department_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-departments--department_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-departments--department_id-" data-method="PUT"
      data-path="api/departments/{department_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-departments--department_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-departments--department_id-"
                    onclick="tryItOut('PUTapi-departments--department_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-departments--department_id-"
                    onclick="cancelTryOut('PUTapi-departments--department_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-departments--department_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/departments/{department_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-departments--department_id-"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="PUTapi-departments--department_id-"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-departments--department_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-departments--department_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>department_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="department_id"                data-endpoint="PUTapi-departments--department_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the department. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>department</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="department"                data-endpoint="PUTapi-departments--department_id-"
               value="1"
               data-component="url">
    <br>
<p>ID department. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-departments--department_id-"
               value="Công ty A"
               data-component="body">
    <br>
<p>Tên department. Example: <code>Công ty A</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="PUTapi-departments--department_id-"
               value="cong-ty-a"
               data-component="body">
    <br>
<p>Slug. Example: <code>cong-ty-a</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-departments--department_id-"
               value="Tổ chức quản trị"
               data-component="body">
    <br>
<p>Mô tả. Example: <code>Tổ chức quản trị</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PUTapi-departments--department_id-"
               value="inactive"
               data-component="body">
    <br>
<p>Trạng thái: active, inactive. Example: <code>inactive</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>parent_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="parent_id"                data-endpoint="PUTapi-departments--department_id-"
               value=""
               data-component="body">
    <br>
<p>ID department cha (null = gốc).</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sort_order</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="sort_order"                data-endpoint="PUTapi-departments--department_id-"
               value="0"
               data-component="body">
    <br>
<p>Thứ tự. Example: <code>0</code></p>
        </div>
        </form>

                    <h2 id="core-department-PATCHapi-departments--department_id-">Cập nhật department</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PATCHapi-departments--department_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost:8000/api/departments/1" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Công ty A\",
    \"slug\": \"cong-ty-a\",
    \"description\": \"Tổ chức quản trị\",
    \"status\": \"inactive\",
    \"parent_id\": null,
    \"sort_order\": 0
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/departments/1"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Công ty A",
    "slug": "cong-ty-a",
    "description": "Tổ chức quản trị",
    "status": "inactive",
    "parent_id": null,
    "sort_order": 0
};

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/departments/1';
$response = $client-&gt;patch(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'Công ty A',
            'slug' =&gt; 'cong-ty-a',
            'description' =&gt; 'Tổ chức quản trị',
            'status' =&gt; 'inactive',
            'parent_id' =&gt; null,
            'sort_order' =&gt; 0,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-PATCHapi-departments--department_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 81,
        &quot;name&quot;: &quot;Schuster Inc&quot;,
        &quot;slug&quot;: &quot;perspiciatis-quo-omnis-nostrum-aut-adipisci-quidem-nostrum-qui&quot;,
        &quot;description&quot;: &quot;Iure odit et et modi ipsum nostrum omnis.&quot;,
        &quot;status&quot;: &quot;active&quot;,
        &quot;parent_id&quot;: 80,
        &quot;sort_order&quot;: 54,
        &quot;depth&quot;: 1,
        &quot;created_by&quot;: &quot;N/A&quot;,
        &quot;updated_by&quot;: &quot;N/A&quot;,
        &quot;created_at&quot;: &quot;03:43:48 25/03/2026&quot;,
        &quot;updated_at&quot;: &quot;03:43:48 25/03/2026&quot;,
        &quot;parent&quot;: {
            &quot;id&quot;: 80,
            &quot;name&quot;: &quot;Tromp-Leffler&quot;,
            &quot;slug&quot;: &quot;non-facere-tempora-ex-voluptatem-laboriosam-praesentium&quot;,
            &quot;description&quot;: &quot;Molestias fugit deleniti distinctio eum doloremque id.&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;parent_id&quot;: null,
            &quot;sort_order&quot;: 61,
            &quot;depth&quot;: 0,
            &quot;created_by&quot;: &quot;N/A&quot;,
            &quot;updated_by&quot;: &quot;N/A&quot;,
            &quot;created_at&quot;: &quot;03:43:48 25/03/2026&quot;,
            &quot;updated_at&quot;: &quot;03:43:48 25/03/2026&quot;
        },
        &quot;children&quot;: [
            {
                &quot;id&quot;: 82,
                &quot;name&quot;: &quot;Batz Inc&quot;,
                &quot;slug&quot;: &quot;mollitia-deleniti-nemo-odit-quia-officia&quot;,
                &quot;description&quot;: &quot;Neque blanditiis odio veritatis excepturi doloribus delectus.&quot;,
                &quot;status&quot;: &quot;inactive&quot;,
                &quot;parent_id&quot;: 81,
                &quot;sort_order&quot;: 22,
                &quot;depth&quot;: 2,
                &quot;created_by&quot;: &quot;N/A&quot;,
                &quot;updated_by&quot;: &quot;N/A&quot;,
                &quot;created_at&quot;: &quot;03:43:48 25/03/2026&quot;,
                &quot;updated_at&quot;: &quot;03:43:48 25/03/2026&quot;
            }
        ]
    },
    &quot;success&quot;: &quot;true&quot;,
    &quot;message&quot;: &quot;Department đ&atilde; được cập nhật!&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PATCHapi-departments--department_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-departments--department_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-departments--department_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHapi-departments--department_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-departments--department_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHapi-departments--department_id-" data-method="PATCH"
      data-path="api/departments/{department_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-departments--department_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-departments--department_id-"
                    onclick="tryItOut('PATCHapi-departments--department_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-departments--department_id-"
                    onclick="cancelTryOut('PATCHapi-departments--department_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-departments--department_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/departments/{department_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PATCHapi-departments--department_id-"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="PATCHapi-departments--department_id-"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHapi-departments--department_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHapi-departments--department_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>department_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="department_id"                data-endpoint="PATCHapi-departments--department_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the department. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>department</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="department"                data-endpoint="PATCHapi-departments--department_id-"
               value="1"
               data-component="url">
    <br>
<p>ID department. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PATCHapi-departments--department_id-"
               value="Công ty A"
               data-component="body">
    <br>
<p>Tên department. Example: <code>Công ty A</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="PATCHapi-departments--department_id-"
               value="cong-ty-a"
               data-component="body">
    <br>
<p>Slug. Example: <code>cong-ty-a</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PATCHapi-departments--department_id-"
               value="Tổ chức quản trị"
               data-component="body">
    <br>
<p>Mô tả. Example: <code>Tổ chức quản trị</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PATCHapi-departments--department_id-"
               value="inactive"
               data-component="body">
    <br>
<p>Trạng thái: active, inactive. Example: <code>inactive</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>parent_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="parent_id"                data-endpoint="PATCHapi-departments--department_id-"
               value=""
               data-component="body">
    <br>
<p>ID department cha (null = gốc).</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sort_order</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="sort_order"                data-endpoint="PATCHapi-departments--department_id-"
               value="0"
               data-component="body">
    <br>
<p>Thứ tự. Example: <code>0</code></p>
        </div>
        </form>

                    <h2 id="core-department-DELETEapi-departments--department_id-">Xóa department</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-departments--department_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/departments/1" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/departments/1"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/departments/1';
$response = $client-&gt;delete(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-DELETEapi-departments--department_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Department đ&atilde; được x&oacute;a!&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-departments--department_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-departments--department_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-departments--department_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-departments--department_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-departments--department_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-departments--department_id-" data-method="DELETE"
      data-path="api/departments/{department_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-departments--department_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-departments--department_id-"
                    onclick="tryItOut('DELETEapi-departments--department_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-departments--department_id-"
                    onclick="cancelTryOut('DELETEapi-departments--department_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-departments--department_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/departments/{department_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-departments--department_id-"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="DELETEapi-departments--department_id-"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-departments--department_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-departments--department_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>department_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="department_id"                data-endpoint="DELETEapi-departments--department_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the department. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>department</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="department"                data-endpoint="DELETEapi-departments--department_id-"
               value="1"
               data-component="url">
    <br>
<p>ID department. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="core-department-PATCHapi-departments--department_id--status">Thay đổi trạng thái department</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PATCHapi-departments--department_id--status">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost:8000/api/departments/1/status" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"status\": \"inactive\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/departments/1/status"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "status": "inactive"
};

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/departments/1/status';
$response = $client-&gt;patch(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'status' =&gt; 'inactive',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-PATCHapi-departments--department_id--status">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 84,
        &quot;name&quot;: &quot;Baumbach Ltd&quot;,
        &quot;slug&quot;: &quot;et-modi-ipsum-nostrum-omnis-autem-et-consequatur&quot;,
        &quot;description&quot;: null,
        &quot;status&quot;: &quot;inactive&quot;,
        &quot;parent_id&quot;: 83,
        &quot;sort_order&quot;: 62,
        &quot;depth&quot;: 1,
        &quot;created_by&quot;: &quot;N/A&quot;,
        &quot;updated_by&quot;: &quot;N/A&quot;,
        &quot;created_at&quot;: &quot;03:43:48 25/03/2026&quot;,
        &quot;updated_at&quot;: &quot;03:43:48 25/03/2026&quot;,
        &quot;parent&quot;: {
            &quot;id&quot;: 83,
            &quot;name&quot;: &quot;VonRueden-Leuschke&quot;,
            &quot;slug&quot;: &quot;voluptatem-laboriosam-praesentium-quis-adipisci&quot;,
            &quot;description&quot;: null,
            &quot;status&quot;: &quot;inactive&quot;,
            &quot;parent_id&quot;: null,
            &quot;sort_order&quot;: 72,
            &quot;depth&quot;: 0,
            &quot;created_by&quot;: &quot;N/A&quot;,
            &quot;updated_by&quot;: &quot;N/A&quot;,
            &quot;created_at&quot;: &quot;03:43:48 25/03/2026&quot;,
            &quot;updated_at&quot;: &quot;03:43:48 25/03/2026&quot;
        },
        &quot;children&quot;: [
            {
                &quot;id&quot;: 85,
                &quot;name&quot;: &quot;Gaylord, Hettinger and Nitzsche&quot;,
                &quot;slug&quot;: &quot;libero-aliquam-veniam-corporis-dolorem-mollitia-deleniti&quot;,
                &quot;description&quot;: &quot;Quia officia est dignissimos neque.&quot;,
                &quot;status&quot;: &quot;inactive&quot;,
                &quot;parent_id&quot;: 84,
                &quot;sort_order&quot;: 6,
                &quot;depth&quot;: 2,
                &quot;created_by&quot;: &quot;N/A&quot;,
                &quot;updated_by&quot;: &quot;N/A&quot;,
                &quot;created_at&quot;: &quot;03:43:48 25/03/2026&quot;,
                &quot;updated_at&quot;: &quot;03:43:48 25/03/2026&quot;
            }
        ]
    },
    &quot;success&quot;: &quot;true&quot;,
    &quot;message&quot;: &quot;Cập nhật trạng th&aacute;i th&agrave;nh c&ocirc;ng!&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PATCHapi-departments--department_id--status" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-departments--department_id--status"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-departments--department_id--status"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHapi-departments--department_id--status" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-departments--department_id--status">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHapi-departments--department_id--status" data-method="PATCH"
      data-path="api/departments/{department_id}/status"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-departments--department_id--status', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-departments--department_id--status"
                    onclick="tryItOut('PATCHapi-departments--department_id--status');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-departments--department_id--status"
                    onclick="cancelTryOut('PATCHapi-departments--department_id--status');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-departments--department_id--status"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/departments/{department_id}/status</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PATCHapi-departments--department_id--status"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="PATCHapi-departments--department_id--status"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHapi-departments--department_id--status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHapi-departments--department_id--status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>department_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="department_id"                data-endpoint="PATCHapi-departments--department_id--status"
               value="1"
               data-component="url">
    <br>
<p>The ID of the department. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>department</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="department"                data-endpoint="PATCHapi-departments--department_id--status"
               value="1"
               data-component="url">
    <br>
<p>ID department. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PATCHapi-departments--department_id--status"
               value="inactive"
               data-component="body">
    <br>
<p>Trạng thái mới: active, inactive. Example: <code>inactive</code></p>
        </div>
        </form>

                <h1 id="core-logactivity">Core - LogActivity</h1>

    

                                <h2 id="core-logactivity-GETapi-log-activities-export">Xuất danh sách nhật ký</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Áp dụng cùng bộ lọc với index. Trả về file Excel.</p>

<span id="example-requests-GETapi-log-activities-export">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/log-activities/export?search=architecto&amp;status=active&amp;from_date=2026-01-01&amp;to_date=2026-12-31&amp;sort_by=architecto&amp;sort_order=desc%0A%0AXu%E1%BA%A5t+ra+c%C3%A1c+tr%C6%B0%E1%BB%9Dng%3A+id%2C+description%2C+user_type%2C+user_id%2C+user_name%2C+department_id%2C+route%2C+method_type%2C+status_code%2C+ip_address%2C+country%2C+user_agent%2C+request_data%2C+created_at%2C+updated_at.&amp;limit=10&amp;method_type=GET&amp;status_code=200" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/log-activities/export"
);

const params = {
    "search": "architecto",
    "status": "active",
    "from_date": "2026-01-01",
    "to_date": "2026-12-31",
    "sort_by": "architecto",
    "sort_order": "desc

Xuất ra các trường: id, description, user_type, user_id, user_name, department_id, route, method_type, status_code, ip_address, country, user_agent, request_data, created_at, updated_at.",
    "limit": "10",
    "method_type": "GET",
    "status_code": "200",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/log-activities/export';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'search' =&gt; 'architecto',
            'status' =&gt; 'active',
            'from_date' =&gt; '2026-01-01',
            'to_date' =&gt; '2026-12-31',
            'sort_by' =&gt; 'architecto',
            'sort_order' =&gt; 'desc

Xuất ra các trường: id, description, user_type, user_id, user_name, department_id, route, method_type, status_code, ip_address, country, user_agent, request_data, created_at, updated_at.',
            'limit' =&gt; '10',
            'method_type' =&gt; 'GET',
            'status_code' =&gt; '200',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-log-activities-export">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-log-activities-export" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-log-activities-export"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-log-activities-export"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-log-activities-export" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-log-activities-export">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-log-activities-export" data-method="GET"
      data-path="api/log-activities/export"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-log-activities-export', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-log-activities-export"
                    onclick="tryItOut('GETapi-log-activities-export');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-log-activities-export"
                    onclick="cancelTryOut('GETapi-log-activities-export');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-log-activities-export"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/log-activities/export</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-log-activities-export"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="GETapi-log-activities-export"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-log-activities-export"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-log-activities-export"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-log-activities-export"
               value="architecto"
               data-component="query">
    <br>
<p>Tìm kiếm (description, route, ip_address, country, user_type). Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="GETapi-log-activities-export"
               value="active"
               data-component="query">
    <br>
<p>Lọc theo trạng thái. Example: <code>active</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>from_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="from_date"                data-endpoint="GETapi-log-activities-export"
               value="2026-01-01"
               data-component="query">
    <br>
<p>date Lọc từ ngày (Y-m-d). Example: <code>2026-01-01</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>to_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="to_date"                data-endpoint="GETapi-log-activities-export"
               value="2026-12-31"
               data-component="query">
    <br>
<p>date Lọc đến ngày (Y-m-d). Example: <code>2026-12-31</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_by</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_by"                data-endpoint="GETapi-log-activities-export"
               value="architecto"
               data-component="query">
    <br>
<p>id, description, route, method_type, status_code, ip_address, country, created_at. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_order</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_order"                data-endpoint="GETapi-log-activities-export"
               value="desc

Xuất ra các trường: id, description, user_type, user_id, user_name, department_id, route, method_type, status_code, ip_address, country, user_agent, request_data, created_at, updated_at."
               data-component="query">
    <br>
<p>asc, desc. Example: `desc</p>
<p>Xuất ra các trường: id, description, user_type, user_id, user_name, department_id, route, method_type, status_code, ip_address, country, user_agent, request_data, created_at, updated_at.`</p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETapi-log-activities-export"
               value="10"
               data-component="query">
    <br>
<p>Số bản ghi mỗi trang (1-100). Must be at least 1. Must not be greater than 100. Example: <code>10</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>method_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="method_type"                data-endpoint="GETapi-log-activities-export"
               value="GET"
               data-component="query">
    <br>
<p>GET, POST, PUT, PATCH, DELETE. Example: <code>GET</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status_code</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="status_code"                data-endpoint="GETapi-log-activities-export"
               value="200"
               data-component="query">
    <br>
<p>Mã HTTP (200, 400, 500...). Example: <code>200</code></p>
            </div>
                </form>

                    <h2 id="core-logactivity-GETapi-log-activities-stats">Thống kê nhật ký</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Tổng số bản ghi sau khi áp dụng bộ lọc.</p>

<span id="example-requests-GETapi-log-activities-stats">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/log-activities/stats?search=127.0.0.1&amp;status=active&amp;from_date=2026-01-01&amp;to_date=2026-12-31&amp;sort_by=created_at&amp;sort_order=desc&amp;limit=10&amp;method_type=GET&amp;status_code=200" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/log-activities/stats"
);

const params = {
    "search": "127.0.0.1",
    "status": "active",
    "from_date": "2026-01-01",
    "to_date": "2026-12-31",
    "sort_by": "created_at",
    "sort_order": "desc",
    "limit": "10",
    "method_type": "GET",
    "status_code": "200",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/log-activities/stats';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'search' =&gt; '127.0.0.1',
            'status' =&gt; 'active',
            'from_date' =&gt; '2026-01-01',
            'to_date' =&gt; '2026-12-31',
            'sort_by' =&gt; 'created_at',
            'sort_order' =&gt; 'desc',
            'limit' =&gt; '10',
            'method_type' =&gt; 'GET',
            'status_code' =&gt; '200',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-log-activities-stats">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;total&quot;: 100
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-log-activities-stats" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-log-activities-stats"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-log-activities-stats"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-log-activities-stats" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-log-activities-stats">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-log-activities-stats" data-method="GET"
      data-path="api/log-activities/stats"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-log-activities-stats', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-log-activities-stats"
                    onclick="tryItOut('GETapi-log-activities-stats');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-log-activities-stats"
                    onclick="cancelTryOut('GETapi-log-activities-stats');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-log-activities-stats"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/log-activities/stats</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-log-activities-stats"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="GETapi-log-activities-stats"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-log-activities-stats"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-log-activities-stats"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-log-activities-stats"
               value="127.0.0.1"
               data-component="query">
    <br>
<p>Tìm kiếm (description, route, ip_address, country, user_type). Example: <code>127.0.0.1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="GETapi-log-activities-stats"
               value="active"
               data-component="query">
    <br>
<p>Lọc theo trạng thái. Example: <code>active</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>from_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="from_date"                data-endpoint="GETapi-log-activities-stats"
               value="2026-01-01"
               data-component="query">
    <br>
<p>date Lọc từ ngày (Y-m-d). Example: <code>2026-01-01</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>to_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="to_date"                data-endpoint="GETapi-log-activities-stats"
               value="2026-12-31"
               data-component="query">
    <br>
<p>date Lọc đến ngày (Y-m-d). Example: <code>2026-12-31</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_by</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_by"                data-endpoint="GETapi-log-activities-stats"
               value="created_at"
               data-component="query">
    <br>
<p>id, description, route, method_type, status_code, ip_address, country, created_at. Example: <code>created_at</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_order</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_order"                data-endpoint="GETapi-log-activities-stats"
               value="desc"
               data-component="query">
    <br>
<p>asc, desc. Example: <code>desc</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETapi-log-activities-stats"
               value="10"
               data-component="query">
    <br>
<p>1-100. Example: <code>10</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>method_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="method_type"                data-endpoint="GETapi-log-activities-stats"
               value="GET"
               data-component="query">
    <br>
<p>GET, POST, PUT, PATCH, DELETE. Example: <code>GET</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status_code</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="status_code"                data-endpoint="GETapi-log-activities-stats"
               value="200"
               data-component="query">
    <br>
<p>Mã HTTP (200, 400, 500...). Example: <code>200</code></p>
            </div>
                </form>

                    <h2 id="core-logactivity-POSTapi-log-activities-delete-by-date">Xóa nhật ký theo khoảng thời gian</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-log-activities-delete-by-date">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/log-activities/delete-by-date" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"from_date\": \"2026-01-01\",
    \"to_date\": \"2026-01-31\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/log-activities/delete-by-date"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "from_date": "2026-01-01",
    "to_date": "2026-01-31"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/log-activities/delete-by-date';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'from_date' =&gt; '2026-01-01',
            'to_date' =&gt; '2026-01-31',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-log-activities-delete-by-date">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Đ&atilde; x&oacute;a th&agrave;nh c&ocirc;ng 10 nhật k&yacute; trong khoảng thời gian!&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-log-activities-delete-by-date" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-log-activities-delete-by-date"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-log-activities-delete-by-date"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-log-activities-delete-by-date" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-log-activities-delete-by-date">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-log-activities-delete-by-date" data-method="POST"
      data-path="api/log-activities/delete-by-date"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-log-activities-delete-by-date', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-log-activities-delete-by-date"
                    onclick="tryItOut('POSTapi-log-activities-delete-by-date');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-log-activities-delete-by-date"
                    onclick="cancelTryOut('POSTapi-log-activities-delete-by-date');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-log-activities-delete-by-date"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/log-activities/delete-by-date</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-log-activities-delete-by-date"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="POSTapi-log-activities-delete-by-date"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-log-activities-delete-by-date"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-log-activities-delete-by-date"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>from_date</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="from_date"                data-endpoint="POSTapi-log-activities-delete-by-date"
               value="2026-01-01"
               data-component="body">
    <br>
<p>Từ ngày (Y-m-d). Example: <code>2026-01-01</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>to_date</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="to_date"                data-endpoint="POSTapi-log-activities-delete-by-date"
               value="2026-01-31"
               data-component="body">
    <br>
<p>Đến ngày (Y-m-d). Example: <code>2026-01-31</code></p>
        </div>
        </form>

                    <h2 id="core-logactivity-POSTapi-log-activities-clear">Xóa toàn bộ nhật ký</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-log-activities-clear">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/log-activities/clear" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/log-activities/clear"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/log-activities/clear';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-log-activities-clear">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Đ&atilde; x&oacute;a to&agrave;n bộ 100 nhật k&yacute;!&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-log-activities-clear" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-log-activities-clear"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-log-activities-clear"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-log-activities-clear" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-log-activities-clear">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-log-activities-clear" data-method="POST"
      data-path="api/log-activities/clear"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-log-activities-clear', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-log-activities-clear"
                    onclick="tryItOut('POSTapi-log-activities-clear');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-log-activities-clear"
                    onclick="cancelTryOut('POSTapi-log-activities-clear');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-log-activities-clear"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/log-activities/clear</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-log-activities-clear"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="POSTapi-log-activities-clear"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-log-activities-clear"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-log-activities-clear"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="core-logactivity-POSTapi-log-activities-bulk-delete">Xóa hàng loạt nhật ký</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-log-activities-bulk-delete">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/log-activities/bulk-delete" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"ids\": [
        1,
        2,
        3
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/log-activities/bulk-delete"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "ids": [
        1,
        2,
        3
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/log-activities/bulk-delete';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'ids' =&gt; [
                1,
                2,
                3,
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-log-activities-bulk-delete">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Đ&atilde; x&oacute;a th&agrave;nh c&ocirc;ng 3 nhật k&yacute;!&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-log-activities-bulk-delete" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-log-activities-bulk-delete"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-log-activities-bulk-delete"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-log-activities-bulk-delete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-log-activities-bulk-delete">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-log-activities-bulk-delete" data-method="POST"
      data-path="api/log-activities/bulk-delete"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-log-activities-bulk-delete', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-log-activities-bulk-delete"
                    onclick="tryItOut('POSTapi-log-activities-bulk-delete');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-log-activities-bulk-delete"
                    onclick="cancelTryOut('POSTapi-log-activities-bulk-delete');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-log-activities-bulk-delete"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/log-activities/bulk-delete</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-log-activities-bulk-delete"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="POSTapi-log-activities-bulk-delete"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-log-activities-bulk-delete"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-log-activities-bulk-delete"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ids</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ids[0]"                data-endpoint="POSTapi-log-activities-bulk-delete"
               data-component="body">
        <input type="text" style="display: none"
               name="ids[1]"                data-endpoint="POSTapi-log-activities-bulk-delete"
               data-component="body">
    <br>
<p>Danh sách ID.</p>
        </div>
        </form>

                    <h2 id="core-logactivity-GETapi-log-activities">Danh sách nhật ký</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-log-activities">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/log-activities?search=login&amp;status=active&amp;from_date=2026-01-01&amp;to_date=2026-12-31&amp;sort_by=created_at&amp;sort_order=desc&amp;limit=10&amp;method_type=architecto&amp;status_code=16" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/log-activities"
);

const params = {
    "search": "login",
    "status": "active",
    "from_date": "2026-01-01",
    "to_date": "2026-12-31",
    "sort_by": "created_at",
    "sort_order": "desc",
    "limit": "10",
    "method_type": "architecto",
    "status_code": "16",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/log-activities';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'search' =&gt; 'login',
            'status' =&gt; 'active',
            'from_date' =&gt; '2026-01-01',
            'to_date' =&gt; '2026-12-31',
            'sort_by' =&gt; 'created_at',
            'sort_order' =&gt; 'desc',
            'limit' =&gt; '10',
            'method_type' =&gt; 'architecto',
            'status_code' =&gt; '16',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-log-activities">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 34,
            &quot;description&quot;: &quot;Et animi quos velit et fugiat.&quot;,
            &quot;user_type&quot;: &quot;User&quot;,
            &quot;user_id&quot;: null,
            &quot;user_name&quot;: &quot;Guest&quot;,
            &quot;department_id&quot;: null,
            &quot;route&quot;: &quot;http://www.dach.com/mollitia-modi-deserunt-aut-ab-provident-perspiciatis-quo.html&quot;,
            &quot;method_type&quot;: &quot;PATCH&quot;,
            &quot;status_code&quot;: 404,
            &quot;ip_address&quot;: &quot;125.161.29.220&quot;,
            &quot;country&quot;: &quot;Pakistan&quot;,
            &quot;user_agent&quot;: &quot;Mozilla/5.0 (Windows NT 5.0; en-US; rv:1.9.2.20) Gecko/20251110 Firefox/35.0&quot;,
            &quot;request_data&quot;: {
                &quot;sample&quot;: &quot;et&quot;
            },
            &quot;created_at&quot;: &quot;03:43:48 25/03/2026&quot;,
            &quot;updated_at&quot;: &quot;03:43:48 25/03/2026&quot;
        },
        {
            &quot;id&quot;: 35,
            &quot;description&quot;: &quot;Aut dolores enim non facere tempora ex voluptatem.&quot;,
            &quot;user_type&quot;: &quot;User&quot;,
            &quot;user_id&quot;: null,
            &quot;user_name&quot;: &quot;Guest&quot;,
            &quot;department_id&quot;: null,
            &quot;route&quot;: &quot;http://raynor.org/molestias-fugit-deleniti-distinctio-eum-doloremque-id&quot;,
            &quot;method_type&quot;: &quot;PATCH&quot;,
            &quot;status_code&quot;: 201,
            &quot;ip_address&quot;: &quot;239.169.15.174&quot;,
            &quot;country&quot;: &quot;Turkmenistan&quot;,
            &quot;user_agent&quot;: &quot;Mozilla/5.0 (Windows 98; Win 9x 4.90) AppleWebKit/533.2 (KHTML, like Gecko) Chrome/86.0.4047.69 Safari/533.2 Edg/86.01025.45&quot;,
            &quot;request_data&quot;: {
                &quot;sample&quot;: &quot;accusamus&quot;
            },
            &quot;created_at&quot;: &quot;03:43:48 25/03/2026&quot;,
            &quot;updated_at&quot;: &quot;03:43:48 25/03/2026&quot;
        }
    ],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;/?page=1&quot;,
        &quot;last&quot;: &quot;/?page=1&quot;,
        &quot;prev&quot;: null,
        &quot;next&quot;: null
    },
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 1,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;/?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;page&quot;: 1,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;/&quot;,
        &quot;per_page&quot;: 10,
        &quot;to&quot;: 2,
        &quot;total&quot;: 2
    },
    &quot;success&quot;: &quot;true&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-log-activities" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-log-activities"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-log-activities"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-log-activities" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-log-activities">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-log-activities" data-method="GET"
      data-path="api/log-activities"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-log-activities', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-log-activities"
                    onclick="tryItOut('GETapi-log-activities');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-log-activities"
                    onclick="cancelTryOut('GETapi-log-activities');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-log-activities"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/log-activities</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-log-activities"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="GETapi-log-activities"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-log-activities"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-log-activities"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-log-activities"
               value="login"
               data-component="query">
    <br>
<p>Tìm kiếm. Example: <code>login</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="GETapi-log-activities"
               value="active"
               data-component="query">
    <br>
<p>Lọc theo trạng thái. Example: <code>active</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>from_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="from_date"                data-endpoint="GETapi-log-activities"
               value="2026-01-01"
               data-component="query">
    <br>
<p>date Từ ngày. Example: <code>2026-01-01</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>to_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="to_date"                data-endpoint="GETapi-log-activities"
               value="2026-12-31"
               data-component="query">
    <br>
<p>date Đến ngày. Example: <code>2026-12-31</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_by</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_by"                data-endpoint="GETapi-log-activities"
               value="created_at"
               data-component="query">
    <br>
<p>Example: <code>created_at</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_order</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_order"                data-endpoint="GETapi-log-activities"
               value="desc"
               data-component="query">
    <br>
<p>asc, desc. Example: <code>desc</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETapi-log-activities"
               value="10"
               data-component="query">
    <br>
<p>Example: <code>10</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>method_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="method_type"                data-endpoint="GETapi-log-activities"
               value="architecto"
               data-component="query">
    <br>
<p>GET, POST, PUT, PATCH, DELETE. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status_code</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="status_code"                data-endpoint="GETapi-log-activities"
               value="16"
               data-component="query">
    <br>
<p>Mã HTTP. Example: <code>16</code></p>
            </div>
                </form>

                    <h2 id="core-logactivity-GETapi-log-activities--logActivity_id-">Chi tiết nhật ký</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-log-activities--logActivity_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/log-activities/15" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/log-activities/15"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/log-activities/15';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-log-activities--logActivity_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 36,
        &quot;description&quot;: &quot;Adipisci quidem nostrum qui commodi incidunt iure.&quot;,
        &quot;user_type&quot;: &quot;User&quot;,
        &quot;user_id&quot;: 52,
        &quot;user_name&quot;: &quot;Bridget Schaden&quot;,
        &quot;department_id&quot;: 86,
        &quot;route&quot;: &quot;https://mclaughlin.com/ipsum-nostrum-omnis-autem-et-consequatur-aut-dolores-enim.html&quot;,
        &quot;method_type&quot;: &quot;POST&quot;,
        &quot;status_code&quot;: 401,
        &quot;ip_address&quot;: &quot;222.107.64.3&quot;,
        &quot;country&quot;: &quot;Montserrat&quot;,
        &quot;user_agent&quot;: &quot;Opera/8.56 (Windows NT 6.0; nl-NL) Presto/2.10.287 Version/10.00&quot;,
        &quot;request_data&quot;: {
            &quot;sample&quot;: &quot;veniam&quot;
        },
        &quot;created_at&quot;: &quot;03:43:48 25/03/2026&quot;,
        &quot;updated_at&quot;: &quot;03:43:48 25/03/2026&quot;
    },
    &quot;success&quot;: &quot;true&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-log-activities--logActivity_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-log-activities--logActivity_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-log-activities--logActivity_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-log-activities--logActivity_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-log-activities--logActivity_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-log-activities--logActivity_id-" data-method="GET"
      data-path="api/log-activities/{logActivity_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-log-activities--logActivity_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-log-activities--logActivity_id-"
                    onclick="tryItOut('GETapi-log-activities--logActivity_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-log-activities--logActivity_id-"
                    onclick="cancelTryOut('GETapi-log-activities--logActivity_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-log-activities--logActivity_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/log-activities/{logActivity_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-log-activities--logActivity_id-"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="GETapi-log-activities--logActivity_id-"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-log-activities--logActivity_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-log-activities--logActivity_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>logActivity_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="logActivity_id"                data-endpoint="GETapi-log-activities--logActivity_id-"
               value="15"
               data-component="url">
    <br>
<p>The ID of the logActivity. Example: <code>15</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>logActivity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="logActivity"                data-endpoint="GETapi-log-activities--logActivity_id-"
               value="1"
               data-component="url">
    <br>
<p>ID nhật ký. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="core-logactivity-DELETEapi-log-activities--logActivity_id-">Xóa nhật ký</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-log-activities--logActivity_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/log-activities/15" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/log-activities/15"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/log-activities/15';
$response = $client-&gt;delete(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-DELETEapi-log-activities--logActivity_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Đ&atilde; x&oacute;a nhật k&yacute; th&agrave;nh c&ocirc;ng!&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-log-activities--logActivity_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-log-activities--logActivity_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-log-activities--logActivity_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-log-activities--logActivity_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-log-activities--logActivity_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-log-activities--logActivity_id-" data-method="DELETE"
      data-path="api/log-activities/{logActivity_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-log-activities--logActivity_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-log-activities--logActivity_id-"
                    onclick="tryItOut('DELETEapi-log-activities--logActivity_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-log-activities--logActivity_id-"
                    onclick="cancelTryOut('DELETEapi-log-activities--logActivity_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-log-activities--logActivity_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/log-activities/{logActivity_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-log-activities--logActivity_id-"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="DELETEapi-log-activities--logActivity_id-"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-log-activities--logActivity_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-log-activities--logActivity_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>logActivity_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="logActivity_id"                data-endpoint="DELETEapi-log-activities--logActivity_id-"
               value="15"
               data-component="url">
    <br>
<p>The ID of the logActivity. Example: <code>15</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>logActivity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="logActivity"                data-endpoint="DELETEapi-log-activities--logActivity_id-"
               value="1"
               data-component="url">
    <br>
<p>ID nhật ký. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="core-permission">Core - Permission</h1>

    

                                <h2 id="core-permission-GETapi-permissions-export">Xuất danh sách permission</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Áp dụng cùng bộ lọc với index. Xuất ra các trường: id, name, guard_name, description, sort_order, parent_id, created_at, updated_at.</p>

<span id="example-requests-GETapi-permissions-export">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/permissions/export?search=architecto&amp;status=active&amp;from_date=architecto&amp;to_date=architecto&amp;sort_by=architecto&amp;sort_order=architecto&amp;limit=10" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/permissions/export"
);

const params = {
    "search": "architecto",
    "status": "active",
    "from_date": "architecto",
    "to_date": "architecto",
    "sort_by": "architecto",
    "sort_order": "architecto",
    "limit": "10",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/permissions/export';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'search' =&gt; 'architecto',
            'status' =&gt; 'active',
            'from_date' =&gt; 'architecto',
            'to_date' =&gt; 'architecto',
            'sort_by' =&gt; 'architecto',
            'sort_order' =&gt; 'architecto',
            'limit' =&gt; '10',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-permissions-export">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-permissions-export" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-permissions-export"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-permissions-export"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-permissions-export" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-permissions-export">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-permissions-export" data-method="GET"
      data-path="api/permissions/export"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-permissions-export', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-permissions-export"
                    onclick="tryItOut('GETapi-permissions-export');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-permissions-export"
                    onclick="cancelTryOut('GETapi-permissions-export');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-permissions-export"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/permissions/export</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-permissions-export"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="GETapi-permissions-export"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-permissions-export"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-permissions-export"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-permissions-export"
               value="architecto"
               data-component="query">
    <br>
<p>Từ khóa tìm kiếm (name, guard_name). Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="GETapi-permissions-export"
               value="active"
               data-component="query">
    <br>
<p>Lọc theo trạng thái. Example: <code>active</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>from_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="from_date"                data-endpoint="GETapi-permissions-export"
               value="architecto"
               data-component="query">
    <br>
<p>date Lọc từ ngày tạo (created_at) (Y-m-d). Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>to_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="to_date"                data-endpoint="GETapi-permissions-export"
               value="architecto"
               data-component="query">
    <br>
<p>date Lọc đến ngày tạo (created_at) (Y-m-d). Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_by</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_by"                data-endpoint="GETapi-permissions-export"
               value="architecto"
               data-component="query">
    <br>
<p>Sắp xếp theo: id, name, guard_name, created_at, updated_at. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_order</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_order"                data-endpoint="GETapi-permissions-export"
               value="architecto"
               data-component="query">
    <br>
<p>Thứ tự: asc, desc. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETapi-permissions-export"
               value="10"
               data-component="query">
    <br>
<p>Số bản ghi mỗi trang (1-100). Must be at least 1. Must not be greater than 100. Example: <code>10</code></p>
            </div>
                </form>

                    <h2 id="core-permission-POSTapi-permissions-import">Nhập danh sách permission</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Cột bắt buộc: name. Cột không bắt buộc: guard_name (mặc định "web"), description, sort_order, parent_id.</p>

<span id="example-requests-POSTapi-permissions-import">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/permissions/import" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "file=@/tmp/phpjt16m8dvrc4j9VviMqL" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/permissions/import"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('file', document.querySelector('input[name="file"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/permissions/import';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'multipart/form-data',
            'Accept' =&gt; 'application/json',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'file',
                'contents' =&gt; fopen('/tmp/phpjt16m8dvrc4j9VviMqL', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-permissions-import">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Import quyền th&agrave;nh c&ocirc;ng.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-permissions-import" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-permissions-import"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-permissions-import"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-permissions-import" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-permissions-import">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-permissions-import" data-method="POST"
      data-path="api/permissions/import"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-permissions-import', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-permissions-import"
                    onclick="tryItOut('POSTapi-permissions-import');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-permissions-import"
                    onclick="cancelTryOut('POSTapi-permissions-import');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-permissions-import"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/permissions/import</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-permissions-import"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="POSTapi-permissions-import"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-permissions-import"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-permissions-import"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>file</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="file"                data-endpoint="POSTapi-permissions-import"
               value=""
               data-component="body">
    <br>
<p>File Excel (xlsx, xls, csv). Cột theo chuẩn export. Example: <code>/tmp/phpjt16m8dvrc4j9VviMqL</code></p>
        </div>
        </form>

                    <h2 id="core-permission-POSTapi-permissions-bulk-delete">Xóa hàng loạt permission</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-permissions-bulk-delete">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/permissions/bulk-delete" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"ids\": [
        1,
        2,
        3
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/permissions/bulk-delete"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "ids": [
        1,
        2,
        3
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/permissions/bulk-delete';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'ids' =&gt; [
                1,
                2,
                3,
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-permissions-bulk-delete">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Đ&atilde; x&oacute;a th&agrave;nh c&ocirc;ng c&aacute;c quyền được chọn!&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-permissions-bulk-delete" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-permissions-bulk-delete"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-permissions-bulk-delete"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-permissions-bulk-delete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-permissions-bulk-delete">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-permissions-bulk-delete" data-method="POST"
      data-path="api/permissions/bulk-delete"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-permissions-bulk-delete', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-permissions-bulk-delete"
                    onclick="tryItOut('POSTapi-permissions-bulk-delete');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-permissions-bulk-delete"
                    onclick="cancelTryOut('POSTapi-permissions-bulk-delete');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-permissions-bulk-delete"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/permissions/bulk-delete</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-permissions-bulk-delete"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="POSTapi-permissions-bulk-delete"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-permissions-bulk-delete"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-permissions-bulk-delete"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ids</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ids[0]"                data-endpoint="POSTapi-permissions-bulk-delete"
               data-component="body">
        <input type="text" style="display: none"
               name="ids[1]"                data-endpoint="POSTapi-permissions-bulk-delete"
               data-component="body">
    <br>
<p>Danh sách ID.</p>
        </div>
        </form>

                    <h2 id="core-permission-GETapi-permissions-stats">Thống kê permission</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Tổng số bản ghi sau khi áp dụng bộ lọc.</p>

<span id="example-requests-GETapi-permissions-stats">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/permissions/stats?search=posts&amp;status=active&amp;from_date=2026-02-01&amp;to_date=2026-02-17&amp;sort_by=created_at&amp;sort_order=desc&amp;limit=10" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/permissions/stats"
);

const params = {
    "search": "posts",
    "status": "active",
    "from_date": "2026-02-01",
    "to_date": "2026-02-17",
    "sort_by": "created_at",
    "sort_order": "desc",
    "limit": "10",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/permissions/stats';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'search' =&gt; 'posts',
            'status' =&gt; 'active',
            'from_date' =&gt; '2026-02-01',
            'to_date' =&gt; '2026-02-17',
            'sort_by' =&gt; 'created_at',
            'sort_order' =&gt; 'desc',
            'limit' =&gt; '10',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-permissions-stats">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;total&quot;: 20
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-permissions-stats" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-permissions-stats"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-permissions-stats"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-permissions-stats" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-permissions-stats">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-permissions-stats" data-method="GET"
      data-path="api/permissions/stats"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-permissions-stats', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-permissions-stats"
                    onclick="tryItOut('GETapi-permissions-stats');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-permissions-stats"
                    onclick="cancelTryOut('GETapi-permissions-stats');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-permissions-stats"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/permissions/stats</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-permissions-stats"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="GETapi-permissions-stats"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-permissions-stats"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-permissions-stats"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-permissions-stats"
               value="posts"
               data-component="query">
    <br>
<p>Từ khóa tìm kiếm (name, guard_name, description). Example: <code>posts</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="GETapi-permissions-stats"
               value="active"
               data-component="query">
    <br>
<p>Lọc theo trạng thái. Example: <code>active</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>from_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="from_date"                data-endpoint="GETapi-permissions-stats"
               value="2026-02-01"
               data-component="query">
    <br>
<p>date Lọc từ ngày tạo (created_at) (Y-m-d). Example: <code>2026-02-01</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>to_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="to_date"                data-endpoint="GETapi-permissions-stats"
               value="2026-02-17"
               data-component="query">
    <br>
<p>date Lọc đến ngày tạo (created_at) (Y-m-d). Example: <code>2026-02-17</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_by</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_by"                data-endpoint="GETapi-permissions-stats"
               value="created_at"
               data-component="query">
    <br>
<p>Sắp xếp theo: id, name, guard_name, created_at, updated_at. Example: <code>created_at</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_order</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_order"                data-endpoint="GETapi-permissions-stats"
               value="desc"
               data-component="query">
    <br>
<p>Thứ tự: asc, desc. Example: <code>desc</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETapi-permissions-stats"
               value="10"
               data-component="query">
    <br>
<p>Số bản ghi mỗi trang (1-100). Example: <code>10</code></p>
            </div>
                </form>

                    <h2 id="core-permission-GETapi-permissions-tree">Cây permission (toàn bộ cây, không phân trang). Để hiển thị nhóm quyền trên frontend.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-permissions-tree">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/permissions/tree?parent_id=" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/permissions/tree"
);

const params = {
    "parent_id": "",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/permissions/tree';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'parent_id' =&gt; '',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-permissions-tree">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;posts&quot;,
            &quot;guard_name&quot;: &quot;web&quot;,
            &quot;description&quot;: &quot;Quản l&yacute; b&agrave;i viết&quot;,
            &quot;sort_order&quot;: 0,
            &quot;parent_id&quot;: null,
            &quot;children&quot;: []
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-permissions-tree" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-permissions-tree"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-permissions-tree"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-permissions-tree" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-permissions-tree">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-permissions-tree" data-method="GET"
      data-path="api/permissions/tree"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-permissions-tree', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-permissions-tree"
                    onclick="tryItOut('GETapi-permissions-tree');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-permissions-tree"
                    onclick="cancelTryOut('GETapi-permissions-tree');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-permissions-tree"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/permissions/tree</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-permissions-tree"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="GETapi-permissions-tree"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-permissions-tree"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-permissions-tree"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>parent_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="parent_id"                data-endpoint="GETapi-permissions-tree"
               value=""
               data-component="query">
    <br>
<p>Lọc theo parent_id (null = gốc).</p>
            </div>
                </form>

                    <h2 id="core-permission-GETapi-permissions">Danh sách permission</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Lấy danh sách có phân trang, lọc và sắp xếp.</p>

<span id="example-requests-GETapi-permissions">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/permissions?search=posts&amp;status=active&amp;from_date=2026-02-01&amp;to_date=2026-02-17&amp;sort_by=sort_order&amp;sort_order=asc&amp;limit=10" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/permissions"
);

const params = {
    "search": "posts",
    "status": "active",
    "from_date": "2026-02-01",
    "to_date": "2026-02-17",
    "sort_by": "sort_order",
    "sort_order": "asc",
    "limit": "10",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/permissions';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'search' =&gt; 'posts',
            'status' =&gt; 'active',
            'from_date' =&gt; '2026-02-01',
            'to_date' =&gt; '2026-02-17',
            'sort_by' =&gt; 'sort_order',
            'sort_order' =&gt; 'asc',
            'limit' =&gt; '10',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-permissions">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 136,
            &quot;name&quot;: &quot;users.update.4027&quot;,
            &quot;guard_name&quot;: &quot;web&quot;,
            &quot;description&quot;: null,
            &quot;sort_order&quot;: 95,
            &quot;parent_id&quot;: null,
            &quot;created_at&quot;: &quot;03:43:48 25/03/2026&quot;,
            &quot;updated_at&quot;: &quot;03:43:48 25/03/2026&quot;
        },
        {
            &quot;id&quot;: 137,
            &quot;name&quot;: &quot;documents.index.6955&quot;,
            &quot;guard_name&quot;: &quot;web&quot;,
            &quot;description&quot;: null,
            &quot;sort_order&quot;: 39,
            &quot;parent_id&quot;: null,
            &quot;created_at&quot;: &quot;03:43:48 25/03/2026&quot;,
            &quot;updated_at&quot;: &quot;03:43:48 25/03/2026&quot;
        }
    ],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;/?page=1&quot;,
        &quot;last&quot;: &quot;/?page=1&quot;,
        &quot;prev&quot;: null,
        &quot;next&quot;: null
    },
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 1,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;/?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;page&quot;: 1,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;/&quot;,
        &quot;per_page&quot;: 10,
        &quot;to&quot;: 2,
        &quot;total&quot;: 2
    },
    &quot;success&quot;: &quot;true&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-permissions" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-permissions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-permissions"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-permissions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-permissions">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-permissions" data-method="GET"
      data-path="api/permissions"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-permissions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-permissions"
                    onclick="tryItOut('GETapi-permissions');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-permissions"
                    onclick="cancelTryOut('GETapi-permissions');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-permissions"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/permissions</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-permissions"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="GETapi-permissions"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-permissions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-permissions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-permissions"
               value="posts"
               data-component="query">
    <br>
<p>Từ khóa tìm kiếm (name, guard_name, description). Example: <code>posts</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="GETapi-permissions"
               value="active"
               data-component="query">
    <br>
<p>Lọc theo trạng thái. Example: <code>active</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>from_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="from_date"                data-endpoint="GETapi-permissions"
               value="2026-02-01"
               data-component="query">
    <br>
<p>date Lọc từ ngày tạo (created_at) (Y-m-d). Example: <code>2026-02-01</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>to_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="to_date"                data-endpoint="GETapi-permissions"
               value="2026-02-17"
               data-component="query">
    <br>
<p>date Lọc đến ngày tạo (created_at) (Y-m-d). Example: <code>2026-02-17</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_by</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_by"                data-endpoint="GETapi-permissions"
               value="sort_order"
               data-component="query">
    <br>
<p>Sắp xếp theo: id, name, guard_name, description, sort_order, parent_id, created_at, updated_at. Example: <code>sort_order</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_order</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_order"                data-endpoint="GETapi-permissions"
               value="asc"
               data-component="query">
    <br>
<p>Thứ tự: asc, desc. Example: <code>asc</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETapi-permissions"
               value="10"
               data-component="query">
    <br>
<p>Số bản ghi mỗi trang (1-100). Example: <code>10</code></p>
            </div>
                </form>

                    <h2 id="core-permission-GETapi-permissions--permission_id-">Chi tiết permission</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-permissions--permission_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/permissions/1" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/permissions/1"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/permissions/1';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-permissions--permission_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 139,
        &quot;name&quot;: &quot;users.index.4524&quot;,
        &quot;guard_name&quot;: &quot;web&quot;,
        &quot;description&quot;: &quot;Commodi incidunt iure odit.&quot;,
        &quot;sort_order&quot;: 45,
        &quot;parent_id&quot;: 138,
        &quot;parent&quot;: {
            &quot;id&quot;: 138,
            &quot;name&quot;: &quot;documents.show.967&quot;
        },
        &quot;children&quot;: [
            {
                &quot;id&quot;: 140,
                &quot;name&quot;: &quot;roles.destroy.1904&quot;,
                &quot;guard_name&quot;: &quot;web&quot;,
                &quot;description&quot;: null,
                &quot;sort_order&quot;: 93,
                &quot;parent_id&quot;: 139,
                &quot;created_at&quot;: &quot;03:43:48 25/03/2026&quot;,
                &quot;updated_at&quot;: &quot;03:43:48 25/03/2026&quot;
            }
        ],
        &quot;created_at&quot;: &quot;03:43:48 25/03/2026&quot;,
        &quot;updated_at&quot;: &quot;03:43:48 25/03/2026&quot;
    },
    &quot;success&quot;: &quot;true&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-permissions--permission_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-permissions--permission_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-permissions--permission_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-permissions--permission_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-permissions--permission_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-permissions--permission_id-" data-method="GET"
      data-path="api/permissions/{permission_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-permissions--permission_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-permissions--permission_id-"
                    onclick="tryItOut('GETapi-permissions--permission_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-permissions--permission_id-"
                    onclick="cancelTryOut('GETapi-permissions--permission_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-permissions--permission_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/permissions/{permission_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-permissions--permission_id-"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="GETapi-permissions--permission_id-"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-permissions--permission_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-permissions--permission_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>permission_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="permission_id"                data-endpoint="GETapi-permissions--permission_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the permission. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>permission</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="permission"                data-endpoint="GETapi-permissions--permission_id-"
               value="1"
               data-component="url">
    <br>
<p>ID permission. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="core-permission-POSTapi-permissions">Tạo permission mới</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-permissions">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/permissions" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"posts.create\",
    \"guard_name\": \"web\",
    \"description\": \"Eius et animi quos velit et.\",
    \"sort_order\": 0,
    \"parent_id\": 16
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/permissions"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "posts.create",
    "guard_name": "web",
    "description": "Eius et animi quos velit et.",
    "sort_order": 0,
    "parent_id": 16
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/permissions';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'posts.create',
            'guard_name' =&gt; 'web',
            'description' =&gt; 'Eius et animi quos velit et.',
            'sort_order' =&gt; 0,
            'parent_id' =&gt; 16,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-permissions">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 141,
        &quot;name&quot;: &quot;roles.index.660&quot;,
        &quot;guard_name&quot;: &quot;web&quot;,
        &quot;description&quot;: &quot;Et fugiat sunt nihil accusantium.&quot;,
        &quot;sort_order&quot;: 91,
        &quot;parent_id&quot;: null,
        &quot;created_at&quot;: &quot;03:43:48 25/03/2026&quot;,
        &quot;updated_at&quot;: &quot;03:43:48 25/03/2026&quot;
    },
    &quot;success&quot;: &quot;true&quot;,
    &quot;message&quot;: &quot;Quyền đ&atilde; được tạo th&agrave;nh c&ocirc;ng!&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-permissions" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-permissions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-permissions"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-permissions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-permissions">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-permissions" data-method="POST"
      data-path="api/permissions"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-permissions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-permissions"
                    onclick="tryItOut('POSTapi-permissions');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-permissions"
                    onclick="cancelTryOut('POSTapi-permissions');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-permissions"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/permissions</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-permissions"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="POSTapi-permissions"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-permissions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-permissions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-permissions"
               value="posts.create"
               data-component="body">
    <br>
<p>Tên permission. Example: <code>posts.create</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>guard_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="guard_name"                data-endpoint="POSTapi-permissions"
               value="web"
               data-component="body">
    <br>
<p>Guard name (mặc định web). Example: <code>web</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-permissions"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Mô tả hiển thị trên frontend. Example: <code>Eius et animi quos velit et.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sort_order</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="sort_order"                data-endpoint="POSTapi-permissions"
               value="0"
               data-component="body">
    <br>
<p>Thứ tự sắp xếp. Example: <code>0</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>parent_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="parent_id"                data-endpoint="POSTapi-permissions"
               value="16"
               data-component="body">
    <br>
<p>ID permission cha (null = gốc/nhóm). Example: <code>16</code></p>
        </div>
        </form>

                    <h2 id="core-permission-PUTapi-permissions--permission_id-">Cập nhật permission</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-permissions--permission_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/permissions/1" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"posts.update\",
    \"guard_name\": \"web\",
    \"description\": \"Eius et animi quos velit et.\",
    \"sort_order\": 16,
    \"parent_id\": 16
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/permissions/1"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "posts.update",
    "guard_name": "web",
    "description": "Eius et animi quos velit et.",
    "sort_order": 16,
    "parent_id": 16
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/permissions/1';
$response = $client-&gt;put(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'posts.update',
            'guard_name' =&gt; 'web',
            'description' =&gt; 'Eius et animi quos velit et.',
            'sort_order' =&gt; 16,
            'parent_id' =&gt; 16,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-PUTapi-permissions--permission_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 142,
        &quot;name&quot;: &quot;roles.index.4338&quot;,
        &quot;guard_name&quot;: &quot;web&quot;,
        &quot;description&quot;: null,
        &quot;sort_order&quot;: 7,
        &quot;parent_id&quot;: null,
        &quot;created_at&quot;: &quot;03:43:48 25/03/2026&quot;,
        &quot;updated_at&quot;: &quot;03:43:48 25/03/2026&quot;
    },
    &quot;success&quot;: &quot;true&quot;,
    &quot;message&quot;: &quot;Quyền đ&atilde; được cập nhật!&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-permissions--permission_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-permissions--permission_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-permissions--permission_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-permissions--permission_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-permissions--permission_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-permissions--permission_id-" data-method="PUT"
      data-path="api/permissions/{permission_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-permissions--permission_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-permissions--permission_id-"
                    onclick="tryItOut('PUTapi-permissions--permission_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-permissions--permission_id-"
                    onclick="cancelTryOut('PUTapi-permissions--permission_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-permissions--permission_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/permissions/{permission_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-permissions--permission_id-"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="PUTapi-permissions--permission_id-"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-permissions--permission_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-permissions--permission_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>permission_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="permission_id"                data-endpoint="PUTapi-permissions--permission_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the permission. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>permission</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="permission"                data-endpoint="PUTapi-permissions--permission_id-"
               value="1"
               data-component="url">
    <br>
<p>ID permission. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-permissions--permission_id-"
               value="posts.update"
               data-component="body">
    <br>
<p>Tên permission. Example: <code>posts.update</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>guard_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="guard_name"                data-endpoint="PUTapi-permissions--permission_id-"
               value="web"
               data-component="body">
    <br>
<p>Guard name. Example: <code>web</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-permissions--permission_id-"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Mô tả. Example: <code>Eius et animi quos velit et.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sort_order</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="sort_order"                data-endpoint="PUTapi-permissions--permission_id-"
               value="16"
               data-component="body">
    <br>
<p>Thứ tự sắp xếp. Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>parent_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="parent_id"                data-endpoint="PUTapi-permissions--permission_id-"
               value="16"
               data-component="body">
    <br>
<p>ID permission cha (null = gốc). Example: <code>16</code></p>
        </div>
        </form>

                    <h2 id="core-permission-PATCHapi-permissions--permission_id-">Cập nhật permission</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PATCHapi-permissions--permission_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost:8000/api/permissions/1" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"posts.update\",
    \"guard_name\": \"web\",
    \"description\": \"Eius et animi quos velit et.\",
    \"sort_order\": 16,
    \"parent_id\": 16
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/permissions/1"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "posts.update",
    "guard_name": "web",
    "description": "Eius et animi quos velit et.",
    "sort_order": 16,
    "parent_id": 16
};

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/permissions/1';
$response = $client-&gt;patch(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'posts.update',
            'guard_name' =&gt; 'web',
            'description' =&gt; 'Eius et animi quos velit et.',
            'sort_order' =&gt; 16,
            'parent_id' =&gt; 16,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-PATCHapi-permissions--permission_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 143,
        &quot;name&quot;: &quot;roles.index.3491&quot;,
        &quot;guard_name&quot;: &quot;web&quot;,
        &quot;description&quot;: &quot;Sunt nihil accusantium harum mollitia.&quot;,
        &quot;sort_order&quot;: 86,
        &quot;parent_id&quot;: null,
        &quot;created_at&quot;: &quot;03:43:48 25/03/2026&quot;,
        &quot;updated_at&quot;: &quot;03:43:48 25/03/2026&quot;
    },
    &quot;success&quot;: &quot;true&quot;,
    &quot;message&quot;: &quot;Quyền đ&atilde; được cập nhật!&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PATCHapi-permissions--permission_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-permissions--permission_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-permissions--permission_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHapi-permissions--permission_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-permissions--permission_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHapi-permissions--permission_id-" data-method="PATCH"
      data-path="api/permissions/{permission_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-permissions--permission_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-permissions--permission_id-"
                    onclick="tryItOut('PATCHapi-permissions--permission_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-permissions--permission_id-"
                    onclick="cancelTryOut('PATCHapi-permissions--permission_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-permissions--permission_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/permissions/{permission_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PATCHapi-permissions--permission_id-"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="PATCHapi-permissions--permission_id-"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHapi-permissions--permission_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHapi-permissions--permission_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>permission_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="permission_id"                data-endpoint="PATCHapi-permissions--permission_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the permission. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>permission</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="permission"                data-endpoint="PATCHapi-permissions--permission_id-"
               value="1"
               data-component="url">
    <br>
<p>ID permission. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PATCHapi-permissions--permission_id-"
               value="posts.update"
               data-component="body">
    <br>
<p>Tên permission. Example: <code>posts.update</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>guard_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="guard_name"                data-endpoint="PATCHapi-permissions--permission_id-"
               value="web"
               data-component="body">
    <br>
<p>Guard name. Example: <code>web</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PATCHapi-permissions--permission_id-"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Mô tả. Example: <code>Eius et animi quos velit et.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sort_order</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="sort_order"                data-endpoint="PATCHapi-permissions--permission_id-"
               value="16"
               data-component="body">
    <br>
<p>Thứ tự sắp xếp. Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>parent_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="parent_id"                data-endpoint="PATCHapi-permissions--permission_id-"
               value="16"
               data-component="body">
    <br>
<p>ID permission cha (null = gốc). Example: <code>16</code></p>
        </div>
        </form>

                    <h2 id="core-permission-DELETEapi-permissions--permission_id-">Xóa permission</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-permissions--permission_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/permissions/1" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/permissions/1"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/permissions/1';
$response = $client-&gt;delete(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-DELETEapi-permissions--permission_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Quyền đ&atilde; được x&oacute;a!&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-permissions--permission_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-permissions--permission_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-permissions--permission_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-permissions--permission_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-permissions--permission_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-permissions--permission_id-" data-method="DELETE"
      data-path="api/permissions/{permission_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-permissions--permission_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-permissions--permission_id-"
                    onclick="tryItOut('DELETEapi-permissions--permission_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-permissions--permission_id-"
                    onclick="cancelTryOut('DELETEapi-permissions--permission_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-permissions--permission_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/permissions/{permission_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-permissions--permission_id-"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="DELETEapi-permissions--permission_id-"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-permissions--permission_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-permissions--permission_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>permission_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="permission_id"                data-endpoint="DELETEapi-permissions--permission_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the permission. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>permission</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="permission"                data-endpoint="DELETEapi-permissions--permission_id-"
               value="1"
               data-component="url">
    <br>
<p>ID permission. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="core-role">Core - Role</h1>

    

                                <h2 id="core-role-GETapi-roles-export">Xuất danh sách role</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Áp dụng cùng bộ lọc với index. Xuất ra các trường: id, name, guard_name, department_id, department_name, created_at, updated_at.</p>

<span id="example-requests-GETapi-roles-export">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/roles/export?search=architecto&amp;status=active&amp;from_date=architecto&amp;to_date=architecto&amp;sort_by=architecto&amp;sort_order=architecto&amp;limit=10" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/roles/export"
);

const params = {
    "search": "architecto",
    "status": "active",
    "from_date": "architecto",
    "to_date": "architecto",
    "sort_by": "architecto",
    "sort_order": "architecto",
    "limit": "10",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/roles/export';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'search' =&gt; 'architecto',
            'status' =&gt; 'active',
            'from_date' =&gt; 'architecto',
            'to_date' =&gt; 'architecto',
            'sort_by' =&gt; 'architecto',
            'sort_order' =&gt; 'architecto',
            'limit' =&gt; '10',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-roles-export">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-roles-export" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-roles-export"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-roles-export"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-roles-export" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-roles-export">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-roles-export" data-method="GET"
      data-path="api/roles/export"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-roles-export', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-roles-export"
                    onclick="tryItOut('GETapi-roles-export');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-roles-export"
                    onclick="cancelTryOut('GETapi-roles-export');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-roles-export"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/roles/export</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-roles-export"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="GETapi-roles-export"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-roles-export"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-roles-export"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-roles-export"
               value="architecto"
               data-component="query">
    <br>
<p>Từ khóa tìm kiếm (name, guard_name). Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="GETapi-roles-export"
               value="active"
               data-component="query">
    <br>
<p>Lọc theo trạng thái. Example: <code>active</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>from_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="from_date"                data-endpoint="GETapi-roles-export"
               value="architecto"
               data-component="query">
    <br>
<p>date Lọc từ ngày tạo (created_at) (Y-m-d). Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>to_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="to_date"                data-endpoint="GETapi-roles-export"
               value="architecto"
               data-component="query">
    <br>
<p>date Lọc đến ngày tạo (created_at) (Y-m-d). Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_by</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_by"                data-endpoint="GETapi-roles-export"
               value="architecto"
               data-component="query">
    <br>
<p>Sắp xếp theo: id, name, guard_name, created_at, updated_at. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_order</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_order"                data-endpoint="GETapi-roles-export"
               value="architecto"
               data-component="query">
    <br>
<p>Thứ tự: asc, desc. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETapi-roles-export"
               value="10"
               data-component="query">
    <br>
<p>Số bản ghi mỗi trang (1-100). Must be at least 1. Must not be greater than 100. Example: <code>10</code></p>
            </div>
                </form>

                    <h2 id="core-role-POSTapi-roles-import">Nhập danh sách role</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Cột bắt buộc: name. Cột không bắt buộc: guard_name (mặc định "web"), department_id.</p>

<span id="example-requests-POSTapi-roles-import">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/roles/import" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "file=@/tmp/phpnbmfk5av0jjmffG2A8h" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/roles/import"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('file', document.querySelector('input[name="file"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/roles/import';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'multipart/form-data',
            'Accept' =&gt; 'application/json',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'file',
                'contents' =&gt; fopen('/tmp/phpnbmfk5av0jjmffG2A8h', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-roles-import">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Import vai tr&ograve; th&agrave;nh c&ocirc;ng.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-roles-import" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-roles-import"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-roles-import"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-roles-import" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-roles-import">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-roles-import" data-method="POST"
      data-path="api/roles/import"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-roles-import', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-roles-import"
                    onclick="tryItOut('POSTapi-roles-import');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-roles-import"
                    onclick="cancelTryOut('POSTapi-roles-import');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-roles-import"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/roles/import</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-roles-import"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="POSTapi-roles-import"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-roles-import"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-roles-import"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>file</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="file"                data-endpoint="POSTapi-roles-import"
               value=""
               data-component="body">
    <br>
<p>File Excel (xlsx, xls, csv). Cột theo chuẩn export. Example: <code>/tmp/phpnbmfk5av0jjmffG2A8h</code></p>
        </div>
        </form>

                    <h2 id="core-role-POSTapi-roles-bulk-delete">Xóa hàng loạt role</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-roles-bulk-delete">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/roles/bulk-delete" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"ids\": [
        1,
        2,
        3
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/roles/bulk-delete"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "ids": [
        1,
        2,
        3
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/roles/bulk-delete';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'ids' =&gt; [
                1,
                2,
                3,
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-roles-bulk-delete">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Đ&atilde; x&oacute;a th&agrave;nh c&ocirc;ng c&aacute;c vai tr&ograve; được chọn!&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-roles-bulk-delete" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-roles-bulk-delete"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-roles-bulk-delete"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-roles-bulk-delete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-roles-bulk-delete">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-roles-bulk-delete" data-method="POST"
      data-path="api/roles/bulk-delete"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-roles-bulk-delete', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-roles-bulk-delete"
                    onclick="tryItOut('POSTapi-roles-bulk-delete');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-roles-bulk-delete"
                    onclick="cancelTryOut('POSTapi-roles-bulk-delete');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-roles-bulk-delete"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/roles/bulk-delete</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-roles-bulk-delete"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="POSTapi-roles-bulk-delete"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-roles-bulk-delete"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-roles-bulk-delete"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ids</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ids[0]"                data-endpoint="POSTapi-roles-bulk-delete"
               data-component="body">
        <input type="text" style="display: none"
               name="ids[1]"                data-endpoint="POSTapi-roles-bulk-delete"
               data-component="body">
    <br>
<p>Danh sách ID.</p>
        </div>
        </form>

                    <h2 id="core-role-GETapi-roles-stats">Thống kê role</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Tổng số bản ghi (áp dụng cùng bộ lọc với index). Role không có cột status (chuẩn Spatie).</p>

<span id="example-requests-GETapi-roles-stats">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/roles/stats?search=admin&amp;status=active&amp;from_date=2026-02-01&amp;to_date=2026-02-17&amp;sort_by=created_at&amp;sort_order=desc&amp;limit=10" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/roles/stats"
);

const params = {
    "search": "admin",
    "status": "active",
    "from_date": "2026-02-01",
    "to_date": "2026-02-17",
    "sort_by": "created_at",
    "sort_order": "desc",
    "limit": "10",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/roles/stats';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'search' =&gt; 'admin',
            'status' =&gt; 'active',
            'from_date' =&gt; '2026-02-01',
            'to_date' =&gt; '2026-02-17',
            'sort_by' =&gt; 'created_at',
            'sort_order' =&gt; 'desc',
            'limit' =&gt; '10',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-roles-stats">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;total&quot;: 5
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-roles-stats" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-roles-stats"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-roles-stats"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-roles-stats" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-roles-stats">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-roles-stats" data-method="GET"
      data-path="api/roles/stats"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-roles-stats', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-roles-stats"
                    onclick="tryItOut('GETapi-roles-stats');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-roles-stats"
                    onclick="cancelTryOut('GETapi-roles-stats');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-roles-stats"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/roles/stats</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-roles-stats"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="GETapi-roles-stats"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-roles-stats"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-roles-stats"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-roles-stats"
               value="admin"
               data-component="query">
    <br>
<p>Từ khóa tìm kiếm (name, guard_name). Example: <code>admin</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="GETapi-roles-stats"
               value="active"
               data-component="query">
    <br>
<p>Lọc theo trạng thái. Example: <code>active</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>from_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="from_date"                data-endpoint="GETapi-roles-stats"
               value="2026-02-01"
               data-component="query">
    <br>
<p>date Lọc từ ngày tạo (created_at) (Y-m-d). Example: <code>2026-02-01</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>to_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="to_date"                data-endpoint="GETapi-roles-stats"
               value="2026-02-17"
               data-component="query">
    <br>
<p>date Lọc đến ngày tạo (created_at) (Y-m-d). Example: <code>2026-02-17</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_by</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_by"                data-endpoint="GETapi-roles-stats"
               value="created_at"
               data-component="query">
    <br>
<p>Sắp xếp theo: id, name, guard_name, created_at, updated_at. Example: <code>created_at</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_order</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_order"                data-endpoint="GETapi-roles-stats"
               value="desc"
               data-component="query">
    <br>
<p>Thứ tự: asc, desc. Example: <code>desc</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETapi-roles-stats"
               value="10"
               data-component="query">
    <br>
<p>Số bản ghi mỗi trang (1-100). Example: <code>10</code></p>
            </div>
                </form>

                    <h2 id="core-role-GETapi-roles">Danh sách role</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Lấy danh sách có phân trang, lọc và sắp xếp. Có kèm department và permissions.</p>

<span id="example-requests-GETapi-roles">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/roles?search=admin&amp;status=active&amp;from_date=2026-02-01&amp;to_date=2026-02-17&amp;sort_by=id&amp;sort_order=desc&amp;limit=10" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/roles"
);

const params = {
    "search": "admin",
    "status": "active",
    "from_date": "2026-02-01",
    "to_date": "2026-02-17",
    "sort_by": "id",
    "sort_order": "desc",
    "limit": "10",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/roles';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'search' =&gt; 'admin',
            'status' =&gt; 'active',
            'from_date' =&gt; '2026-02-01',
            'to_date' =&gt; '2026-02-17',
            'sort_by' =&gt; 'id',
            'sort_order' =&gt; 'desc',
            'limit' =&gt; '10',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-roles">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 24,
            &quot;name&quot;: &quot;role_ng775&quot;,
            &quot;guard_name&quot;: &quot;web&quot;,
            &quot;department_id&quot;: null,
            &quot;created_at&quot;: &quot;03:43:48 25/03/2026&quot;,
            &quot;updated_at&quot;: &quot;03:43:48 25/03/2026&quot;
        },
        {
            &quot;id&quot;: 25,
            &quot;name&quot;: &quot;role_mi365&quot;,
            &quot;guard_name&quot;: &quot;web&quot;,
            &quot;department_id&quot;: null,
            &quot;created_at&quot;: &quot;03:43:48 25/03/2026&quot;,
            &quot;updated_at&quot;: &quot;03:43:48 25/03/2026&quot;
        }
    ],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;/?page=1&quot;,
        &quot;last&quot;: &quot;/?page=1&quot;,
        &quot;prev&quot;: null,
        &quot;next&quot;: null
    },
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 1,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;/?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;page&quot;: 1,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;/&quot;,
        &quot;per_page&quot;: 10,
        &quot;to&quot;: 2,
        &quot;total&quot;: 2
    },
    &quot;success&quot;: &quot;true&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-roles" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-roles"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-roles"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-roles" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-roles">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-roles" data-method="GET"
      data-path="api/roles"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-roles', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-roles"
                    onclick="tryItOut('GETapi-roles');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-roles"
                    onclick="cancelTryOut('GETapi-roles');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-roles"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/roles</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-roles"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="GETapi-roles"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-roles"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-roles"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-roles"
               value="admin"
               data-component="query">
    <br>
<p>Từ khóa tìm kiếm (name, guard_name). Example: <code>admin</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="GETapi-roles"
               value="active"
               data-component="query">
    <br>
<p>Lọc theo trạng thái. Example: <code>active</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>from_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="from_date"                data-endpoint="GETapi-roles"
               value="2026-02-01"
               data-component="query">
    <br>
<p>date Lọc từ ngày tạo (created_at) (Y-m-d). Example: <code>2026-02-01</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>to_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="to_date"                data-endpoint="GETapi-roles"
               value="2026-02-17"
               data-component="query">
    <br>
<p>date Lọc đến ngày tạo (created_at) (Y-m-d). Example: <code>2026-02-17</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_by</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_by"                data-endpoint="GETapi-roles"
               value="id"
               data-component="query">
    <br>
<p>Sắp xếp theo: id, name, guard_name, created_at, updated_at. Example: <code>id</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_order</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_order"                data-endpoint="GETapi-roles"
               value="desc"
               data-component="query">
    <br>
<p>Thứ tự: asc, desc. Example: <code>desc</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETapi-roles"
               value="10"
               data-component="query">
    <br>
<p>Số bản ghi mỗi trang (1-100). Example: <code>10</code></p>
            </div>
                </form>

                    <h2 id="core-role-GETapi-roles--role_id-">Chi tiết role</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-roles--role_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/roles/1" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/roles/1"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/roles/1';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-roles--role_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 26,
        &quot;name&quot;: &quot;role_wp680&quot;,
        &quot;guard_name&quot;: &quot;web&quot;,
        &quot;department_id&quot;: 70,
        &quot;department&quot;: {
            &quot;id&quot;: 70,
            &quot;name&quot;: &quot;Dare Group&quot;
        },
        &quot;permissions&quot;: [
            &quot;departments.index.7602&quot;
        ],
        &quot;created_at&quot;: &quot;03:43:48 25/03/2026&quot;,
        &quot;updated_at&quot;: &quot;03:43:48 25/03/2026&quot;
    },
    &quot;success&quot;: &quot;true&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-roles--role_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-roles--role_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-roles--role_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-roles--role_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-roles--role_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-roles--role_id-" data-method="GET"
      data-path="api/roles/{role_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-roles--role_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-roles--role_id-"
                    onclick="tryItOut('GETapi-roles--role_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-roles--role_id-"
                    onclick="cancelTryOut('GETapi-roles--role_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-roles--role_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/roles/{role_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-roles--role_id-"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="GETapi-roles--role_id-"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-roles--role_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-roles--role_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>role_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="role_id"                data-endpoint="GETapi-roles--role_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the role. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>role</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="role"                data-endpoint="GETapi-roles--role_id-"
               value="1"
               data-component="url">
    <br>
<p>ID role. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="core-role-POSTapi-roles">Tạo role mới</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-roles">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/roles" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"admin\",
    \"guard_name\": \"web\",
    \"permission_ids\": [
        1,
        2,
        3
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/roles"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "admin",
    "guard_name": "web",
    "permission_ids": [
        1,
        2,
        3
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/roles';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'admin',
            'guard_name' =&gt; 'web',
            'permission_ids' =&gt; [
                1,
                2,
                3,
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-roles">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 27,
        &quot;name&quot;: &quot;role_zm806&quot;,
        &quot;guard_name&quot;: &quot;web&quot;,
        &quot;department_id&quot;: null,
        &quot;permissions&quot;: [
            &quot;documents.index.5606&quot;
        ],
        &quot;created_at&quot;: &quot;03:43:48 25/03/2026&quot;,
        &quot;updated_at&quot;: &quot;03:43:48 25/03/2026&quot;
    },
    &quot;success&quot;: &quot;true&quot;,
    &quot;message&quot;: &quot;Vai tr&ograve; đ&atilde; được tạo th&agrave;nh c&ocirc;ng!&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-roles" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-roles"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-roles"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-roles" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-roles">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-roles" data-method="POST"
      data-path="api/roles"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-roles', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-roles"
                    onclick="tryItOut('POSTapi-roles');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-roles"
                    onclick="cancelTryOut('POSTapi-roles');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-roles"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/roles</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-roles"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="POSTapi-roles"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-roles"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-roles"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-roles"
               value="admin"
               data-component="body">
    <br>
<p>Tên role. Example: <code>admin</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>guard_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="guard_name"                data-endpoint="POSTapi-roles"
               value="web"
               data-component="body">
    <br>
<p>Guard name (mặc định web). Example: <code>web</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>permission_ids</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="permission_ids[0]"                data-endpoint="POSTapi-roles"
               data-component="body">
        <input type="text" style="display: none"
               name="permission_ids[1]"                data-endpoint="POSTapi-roles"
               data-component="body">
    <br>
<p>Danh sách ID permission để sync.</p>
        </div>
        </form>

                    <h2 id="core-role-PUTapi-roles--role_id-">Cập nhật role</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-roles--role_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/roles/1" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"editor\",
    \"guard_name\": \"web\",
    \"permission_ids\": [
        1,
        2
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/roles/1"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "editor",
    "guard_name": "web",
    "permission_ids": [
        1,
        2
    ]
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/roles/1';
$response = $client-&gt;put(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'editor',
            'guard_name' =&gt; 'web',
            'permission_ids' =&gt; [
                1,
                2,
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-PUTapi-roles--role_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 28,
        &quot;name&quot;: &quot;role_yv564&quot;,
        &quot;guard_name&quot;: &quot;web&quot;,
        &quot;department_id&quot;: null,
        &quot;permissions&quot;: [
            &quot;users.update.3433&quot;
        ],
        &quot;created_at&quot;: &quot;03:43:48 25/03/2026&quot;,
        &quot;updated_at&quot;: &quot;03:43:48 25/03/2026&quot;
    },
    &quot;success&quot;: &quot;true&quot;,
    &quot;message&quot;: &quot;Vai tr&ograve; đ&atilde; được cập nhật!&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-roles--role_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-roles--role_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-roles--role_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-roles--role_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-roles--role_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-roles--role_id-" data-method="PUT"
      data-path="api/roles/{role_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-roles--role_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-roles--role_id-"
                    onclick="tryItOut('PUTapi-roles--role_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-roles--role_id-"
                    onclick="cancelTryOut('PUTapi-roles--role_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-roles--role_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/roles/{role_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-roles--role_id-"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="PUTapi-roles--role_id-"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-roles--role_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-roles--role_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>role_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="role_id"                data-endpoint="PUTapi-roles--role_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the role. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>role</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="role"                data-endpoint="PUTapi-roles--role_id-"
               value="1"
               data-component="url">
    <br>
<p>ID role. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-roles--role_id-"
               value="editor"
               data-component="body">
    <br>
<p>Tên role. Example: <code>editor</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>guard_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="guard_name"                data-endpoint="PUTapi-roles--role_id-"
               value="web"
               data-component="body">
    <br>
<p>Guard name. Example: <code>web</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>permission_ids</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="permission_ids[0]"                data-endpoint="PUTapi-roles--role_id-"
               data-component="body">
        <input type="text" style="display: none"
               name="permission_ids[1]"                data-endpoint="PUTapi-roles--role_id-"
               data-component="body">
    <br>
<p>Danh sách ID permission để sync (gửi mảng rỗng để bỏ hết).</p>
        </div>
        </form>

                    <h2 id="core-role-PATCHapi-roles--role_id-">Cập nhật role</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PATCHapi-roles--role_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost:8000/api/roles/1" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"editor\",
    \"guard_name\": \"web\",
    \"permission_ids\": [
        1,
        2
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/roles/1"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "editor",
    "guard_name": "web",
    "permission_ids": [
        1,
        2
    ]
};

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/roles/1';
$response = $client-&gt;patch(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'editor',
            'guard_name' =&gt; 'web',
            'permission_ids' =&gt; [
                1,
                2,
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-PATCHapi-roles--role_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 29,
        &quot;name&quot;: &quot;role_lj575&quot;,
        &quot;guard_name&quot;: &quot;web&quot;,
        &quot;department_id&quot;: null,
        &quot;permissions&quot;: [
            &quot;roles.destroy.6854&quot;
        ],
        &quot;created_at&quot;: &quot;03:43:48 25/03/2026&quot;,
        &quot;updated_at&quot;: &quot;03:43:48 25/03/2026&quot;
    },
    &quot;success&quot;: &quot;true&quot;,
    &quot;message&quot;: &quot;Vai tr&ograve; đ&atilde; được cập nhật!&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PATCHapi-roles--role_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-roles--role_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-roles--role_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHapi-roles--role_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-roles--role_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHapi-roles--role_id-" data-method="PATCH"
      data-path="api/roles/{role_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-roles--role_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-roles--role_id-"
                    onclick="tryItOut('PATCHapi-roles--role_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-roles--role_id-"
                    onclick="cancelTryOut('PATCHapi-roles--role_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-roles--role_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/roles/{role_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PATCHapi-roles--role_id-"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="PATCHapi-roles--role_id-"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHapi-roles--role_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHapi-roles--role_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>role_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="role_id"                data-endpoint="PATCHapi-roles--role_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the role. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>role</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="role"                data-endpoint="PATCHapi-roles--role_id-"
               value="1"
               data-component="url">
    <br>
<p>ID role. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PATCHapi-roles--role_id-"
               value="editor"
               data-component="body">
    <br>
<p>Tên role. Example: <code>editor</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>guard_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="guard_name"                data-endpoint="PATCHapi-roles--role_id-"
               value="web"
               data-component="body">
    <br>
<p>Guard name. Example: <code>web</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>permission_ids</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="permission_ids[0]"                data-endpoint="PATCHapi-roles--role_id-"
               data-component="body">
        <input type="text" style="display: none"
               name="permission_ids[1]"                data-endpoint="PATCHapi-roles--role_id-"
               data-component="body">
    <br>
<p>Danh sách ID permission để sync (gửi mảng rỗng để bỏ hết).</p>
        </div>
        </form>

                    <h2 id="core-role-DELETEapi-roles--role_id-">Xóa role</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-roles--role_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/roles/1" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/roles/1"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/roles/1';
$response = $client-&gt;delete(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-DELETEapi-roles--role_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Vai tr&ograve; đ&atilde; được x&oacute;a!&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-roles--role_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-roles--role_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-roles--role_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-roles--role_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-roles--role_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-roles--role_id-" data-method="DELETE"
      data-path="api/roles/{role_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-roles--role_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-roles--role_id-"
                    onclick="tryItOut('DELETEapi-roles--role_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-roles--role_id-"
                    onclick="cancelTryOut('DELETEapi-roles--role_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-roles--role_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/roles/{role_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-roles--role_id-"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="DELETEapi-roles--role_id-"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-roles--role_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-roles--role_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>role_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="role_id"                data-endpoint="DELETEapi-roles--role_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the role. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>role</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="role"                data-endpoint="DELETEapi-roles--role_id-"
               value="1"
               data-component="url">
    <br>
<p>ID role. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="core-setting">Core - Setting</h1>

    

                                <h2 id="core-setting-GETapi-settings-public">Lấy cấu hình công khai</h2>

<p>
</p>

<p>Trả về các key có is_public = true, nhóm theo group. Không cần xác thực.</p>

<span id="example-requests-GETapi-settings-public">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/settings/public" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/settings/public"
);

const headers = {
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/settings/public';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-settings-public">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{&quot;success&quot;: true, &quot;data&quot;: {&quot;general&quot;: {&quot;copyright&quot;: &quot;&copy; 2026&quot;, &quot;language&quot;: &quot;vi&quot;}, &quot;social&quot;: {...}}}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-settings-public" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-settings-public"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-settings-public"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-settings-public" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-settings-public">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-settings-public" data-method="GET"
      data-path="api/settings/public"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-settings-public', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-settings-public"
                    onclick="tryItOut('GETapi-settings-public');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-settings-public"
                    onclick="cancelTryOut('GETapi-settings-public');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-settings-public"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/settings/public</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="GETapi-settings-public"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-settings-public"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-settings-public"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="core-setting-GETapi-settings">Lấy toàn bộ cấu hình</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Trả về tất cả cấu hình nhóm theo group. Yêu cầu xác thực và quyền settings.index.</p>

<span id="example-requests-GETapi-settings">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/settings" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/settings"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/settings';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-settings">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{&quot;success&quot;: true, &quot;data&quot;: {&quot;general&quot;: {...}, &quot;admin_page&quot;: {...}, &quot;api&quot;: {...}, ...}}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-settings" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-settings"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-settings"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-settings" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-settings">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-settings" data-method="GET"
      data-path="api/settings"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-settings', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-settings"
                    onclick="tryItOut('GETapi-settings');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-settings"
                    onclick="cancelTryOut('GETapi-settings');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-settings"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/settings</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-settings"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="GETapi-settings"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-settings"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-settings"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="core-setting-GETapi-settings--key-">Lấy một key</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Nếu key public: không cần auth. Nếu key private: cần auth và quyền settings.show.</p>

<span id="example-requests-GETapi-settings--key-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/settings/copyright" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/settings/copyright"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/settings/copyright';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-settings--key-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;key&quot;: &quot;copyright&quot;,
        &quot;value&quot;: &quot;&copy; 2026&quot;,
        &quot;group&quot;: &quot;general&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-settings--key-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-settings--key-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-settings--key-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-settings--key-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-settings--key-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-settings--key-" data-method="GET"
      data-path="api/settings/{key}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-settings--key-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-settings--key-"
                    onclick="tryItOut('GETapi-settings--key-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-settings--key-"
                    onclick="cancelTryOut('GETapi-settings--key-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-settings--key-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/settings/{key}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-settings--key-"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="GETapi-settings--key-"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-settings--key-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-settings--key-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>key</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="key"                data-endpoint="GETapi-settings--key-"
               value="copyright"
               data-component="url">
    <br>
<p>Key cấu hình. Example: <code>copyright</code></p>
            </div>
                    </form>

                    <h2 id="core-setting-PUTapi-settings">Cập nhật cấu hình</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Cập nhật một phần hoặc toàn bộ. Body là object key-value. Chỉ cập nhật các key tồn tại.</p>

<span id="example-requests-PUTapi-settings">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/settings" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"copyright\": \"© 2026 QuânDH\",
    \"language\": \"vi\",
    \"log_retention_days\": 90
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/settings"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "copyright": "© 2026 QuânDH",
    "language": "vi",
    "log_retention_days": 90
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/settings';
$response = $client-&gt;put(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'copyright' =&gt; '© 2026 QuânDH',
            'language' =&gt; 'vi',
            'log_retention_days' =&gt; 90,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-PUTapi-settings">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{&quot;success&quot;: true, &quot;data&quot;: {...}, &quot;message&quot;: &quot;Cấu h&igrave;nh đ&atilde; được cập nhật!&quot;}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-settings" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-settings"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-settings"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-settings" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-settings">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-settings" data-method="PUT"
      data-path="api/settings"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-settings', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-settings"
                    onclick="tryItOut('PUTapi-settings');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-settings"
                    onclick="cancelTryOut('PUTapi-settings');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-settings"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/settings</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/settings</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-settings"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="PUTapi-settings"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-settings"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-settings"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>copyright</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="copyright"                data-endpoint="PUTapi-settings"
               value="© 2026 QuânDH"
               data-component="body">
    <br>
<p>optional Thông tin bản quyền. Example: <code>© 2026 QuânDH</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>language</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="language"                data-endpoint="PUTapi-settings"
               value="vi"
               data-component="body">
    <br>
<p>optional Ngôn ngữ. Example: <code>vi</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>log_retention_days</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="log_retention_days"                data-endpoint="PUTapi-settings"
               value="90"
               data-component="body">
    <br>
<p>optional Số ngày giữ nhật ký. Example: <code>90</code></p>
        </div>
        </form>

                <h1 id="core-user">Core - User</h1>

    

                                <h2 id="core-user-GETapi-users-export">Xuất danh sách người dùng</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Áp dụng cùng bộ lọc với index. Xuất ra các trường: id, name, email, user_name, status, created_by, updated_by, created_at, updated_at.</p>

<span id="example-requests-GETapi-users-export">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/users/export?search=architecto&amp;status=architecto&amp;from_date=2026-01-01&amp;to_date=2026-12-31&amp;sort_by=architecto&amp;sort_order=architecto&amp;limit=16" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/users/export"
);

const params = {
    "search": "architecto",
    "status": "architecto",
    "from_date": "2026-01-01",
    "to_date": "2026-12-31",
    "sort_by": "architecto",
    "sort_order": "architecto",
    "limit": "16",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/users/export';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'search' =&gt; 'architecto',
            'status' =&gt; 'architecto',
            'from_date' =&gt; '2026-01-01',
            'to_date' =&gt; '2026-12-31',
            'sort_by' =&gt; 'architecto',
            'sort_order' =&gt; 'architecto',
            'limit' =&gt; '16',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-users-export">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-users-export" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-users-export"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users-export"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-users-export" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users-export">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-users-export" data-method="GET"
      data-path="api/users/export"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-users-export', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-users-export"
                    onclick="tryItOut('GETapi-users-export');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-users-export"
                    onclick="cancelTryOut('GETapi-users-export');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-users-export"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/users/export</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-users-export"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="GETapi-users-export"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-users-export"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-users-export"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-users-export"
               value="architecto"
               data-component="query">
    <br>
<p>Từ khóa tìm kiếm (name, email). Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="GETapi-users-export"
               value="architecto"
               data-component="query">
    <br>
<p>Lọc theo trạng thái: active, inactive, banned. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>from_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="from_date"                data-endpoint="GETapi-users-export"
               value="2026-01-01"
               data-component="query">
    <br>
<p>Lọc từ ngày tạo (Y-m-d). Must be a valid date. Example: <code>2026-01-01</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>to_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="to_date"                data-endpoint="GETapi-users-export"
               value="2026-12-31"
               data-component="query">
    <br>
<p>Lọc đến ngày tạo (Y-m-d). Must be a valid date. Must be a date after or equal to <code>from_date</code>. Example: <code>2026-12-31</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_by</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_by"                data-endpoint="GETapi-users-export"
               value="architecto"
               data-component="query">
    <br>
<p>Sắp xếp theo: id, name, email, created_at. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_order</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_order"                data-endpoint="GETapi-users-export"
               value="architecto"
               data-component="query">
    <br>
<p>Thứ tự: asc, desc. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETapi-users-export"
               value="16"
               data-component="query">
    <br>
<p>Số bản ghi (1-100). Example: <code>16</code></p>
            </div>
                </form>

                    <h2 id="core-user-POSTapi-users-import">Nhập danh sách người dùng</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Cột bắt buộc: name, email. Cột không bắt buộc: user_name, password (mặc định "password"), status (mặc định "active").</p>

<span id="example-requests-POSTapi-users-import">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/users/import" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "file=@/tmp/phpe1gesq5a4lr86Q2Fjuu" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/users/import"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('file', document.querySelector('input[name="file"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/users/import';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'multipart/form-data',
            'Accept' =&gt; 'application/json',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'file',
                'contents' =&gt; fopen('/tmp/phpe1gesq5a4lr86Q2Fjuu', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-users-import">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Import người d&ugrave;ng th&agrave;nh c&ocirc;ng.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-users-import" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-users-import"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-users-import"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-users-import" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-users-import">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-users-import" data-method="POST"
      data-path="api/users/import"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-users-import', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-users-import"
                    onclick="tryItOut('POSTapi-users-import');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-users-import"
                    onclick="cancelTryOut('POSTapi-users-import');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-users-import"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/users/import</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-users-import"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="POSTapi-users-import"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-users-import"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-users-import"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>file</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="file"                data-endpoint="POSTapi-users-import"
               value=""
               data-component="body">
    <br>
<p>File Excel (xlsx, xls, csv). Cột theo chuẩn export. Example: <code>/tmp/phpe1gesq5a4lr86Q2Fjuu</code></p>
        </div>
        </form>

                    <h2 id="core-user-POSTapi-users-bulk-delete">Xóa hàng loạt người dùng</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-users-bulk-delete">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/users/bulk-delete" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"ids\": [
        1,
        2,
        3
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/users/bulk-delete"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "ids": [
        1,
        2,
        3
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/users/bulk-delete';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'ids' =&gt; [
                1,
                2,
                3,
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-users-bulk-delete">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Đ&atilde; x&oacute;a th&agrave;nh c&ocirc;ng c&aacute;c t&agrave;i khoản được chọn!&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-users-bulk-delete" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-users-bulk-delete"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-users-bulk-delete"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-users-bulk-delete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-users-bulk-delete">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-users-bulk-delete" data-method="POST"
      data-path="api/users/bulk-delete"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-users-bulk-delete', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-users-bulk-delete"
                    onclick="tryItOut('POSTapi-users-bulk-delete');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-users-bulk-delete"
                    onclick="cancelTryOut('POSTapi-users-bulk-delete');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-users-bulk-delete"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/users/bulk-delete</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-users-bulk-delete"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="POSTapi-users-bulk-delete"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-users-bulk-delete"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-users-bulk-delete"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ids</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ids[0]"                data-endpoint="POSTapi-users-bulk-delete"
               data-component="body">
        <input type="text" style="display: none"
               name="ids[1]"                data-endpoint="POSTapi-users-bulk-delete"
               data-component="body">
    <br>
<p>Danh sách ID.</p>
        </div>
        </form>

                    <h2 id="core-user-PATCHapi-users-bulk-status">Cập nhật trạng thái hàng loạt</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PATCHapi-users-bulk-status">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost:8000/api/users/bulk-status" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"ids\": [
        1,
        2,
        3
    ],
    \"status\": \"active\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/users/bulk-status"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "ids": [
        1,
        2,
        3
    ],
    "status": "active"
};

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/users/bulk-status';
$response = $client-&gt;patch(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'ids' =&gt; [
                1,
                2,
                3,
            ],
            'status' =&gt; 'active',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-PATCHapi-users-bulk-status">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Cập nhật trạng th&aacute;i th&agrave;nh c&ocirc;ng.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PATCHapi-users-bulk-status" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-users-bulk-status"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-users-bulk-status"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHapi-users-bulk-status" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-users-bulk-status">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHapi-users-bulk-status" data-method="PATCH"
      data-path="api/users/bulk-status"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-users-bulk-status', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-users-bulk-status"
                    onclick="tryItOut('PATCHapi-users-bulk-status');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-users-bulk-status"
                    onclick="cancelTryOut('PATCHapi-users-bulk-status');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-users-bulk-status"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/users/bulk-status</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PATCHapi-users-bulk-status"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="PATCHapi-users-bulk-status"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHapi-users-bulk-status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHapi-users-bulk-status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ids</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ids[0]"                data-endpoint="PATCHapi-users-bulk-status"
               data-component="body">
        <input type="text" style="display: none"
               name="ids[1]"                data-endpoint="PATCHapi-users-bulk-status"
               data-component="body">
    <br>
<p>Danh sách ID.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PATCHapi-users-bulk-status"
               value="active"
               data-component="body">
    <br>
<p>Trạng thái: active, inactive, banned. Example: <code>active</code></p>
        </div>
        </form>

                    <h2 id="core-user-GETapi-users-stats">Thống kê người dùng</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Tổng số, đang kích hoạt (active), không kích hoạt (inactive, banned). Áp dụng cùng bộ lọc với index.</p>

<span id="example-requests-GETapi-users-stats">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/users/stats?search=john&amp;status=architecto&amp;from_date=2026-01-01&amp;to_date=2026-12-31&amp;sort_by=created_at&amp;sort_order=desc&amp;limit=10" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/users/stats"
);

const params = {
    "search": "john",
    "status": "architecto",
    "from_date": "2026-01-01",
    "to_date": "2026-12-31",
    "sort_by": "created_at",
    "sort_order": "desc",
    "limit": "10",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/users/stats';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'search' =&gt; 'john',
            'status' =&gt; 'architecto',
            'from_date' =&gt; '2026-01-01',
            'to_date' =&gt; '2026-12-31',
            'sort_by' =&gt; 'created_at',
            'sort_order' =&gt; 'desc',
            'limit' =&gt; '10',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-users-stats">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;total&quot;: 10,
        &quot;active&quot;: 5,
        &quot;inactive&quot;: 5
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-users-stats" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-users-stats"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users-stats"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-users-stats" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users-stats">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-users-stats" data-method="GET"
      data-path="api/users/stats"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-users-stats', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-users-stats"
                    onclick="tryItOut('GETapi-users-stats');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-users-stats"
                    onclick="cancelTryOut('GETapi-users-stats');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-users-stats"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/users/stats</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-users-stats"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="GETapi-users-stats"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-users-stats"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-users-stats"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-users-stats"
               value="john"
               data-component="query">
    <br>
<p>Từ khóa tìm kiếm (name, email, user_name). Example: <code>john</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="GETapi-users-stats"
               value="architecto"
               data-component="query">
    <br>
<p>Lọc theo trạng thái: active, inactive, banned. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>from_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="from_date"                data-endpoint="GETapi-users-stats"
               value="2026-01-01"
               data-component="query">
    <br>
<p>Lọc từ ngày tạo (Y-m-d). Must be a valid date. Example: <code>2026-01-01</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>to_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="to_date"                data-endpoint="GETapi-users-stats"
               value="2026-12-31"
               data-component="query">
    <br>
<p>Lọc đến ngày tạo (Y-m-d). Must be a valid date. Must be a date after or equal to <code>from_date</code>. Example: <code>2026-12-31</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_by</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_by"                data-endpoint="GETapi-users-stats"
               value="created_at"
               data-component="query">
    <br>
<p>Sắp xếp theo: id, name, email, user_name, created_at. Example: <code>created_at</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_order</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_order"                data-endpoint="GETapi-users-stats"
               value="desc"
               data-component="query">
    <br>
<p>Thứ tự: asc, desc. Example: <code>desc</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETapi-users-stats"
               value="10"
               data-component="query">
    <br>
<p>Số bản ghi mỗi trang (1-100). Example: <code>10</code></p>
            </div>
                </form>

                    <h2 id="core-user-GETapi-users">Danh sách người dùng</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Lấy danh sách có phân trang, lọc và sắp xếp.</p>

<span id="example-requests-GETapi-users">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/users?search=john&amp;status=architecto&amp;from_date=2026-01-01&amp;to_date=2026-12-31&amp;sort_by=created_at&amp;sort_order=desc&amp;limit=10" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/users"
);

const params = {
    "search": "john",
    "status": "architecto",
    "from_date": "2026-01-01",
    "to_date": "2026-12-31",
    "sort_by": "created_at",
    "sort_order": "desc",
    "limit": "10",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/users';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'search' =&gt; 'john',
            'status' =&gt; 'architecto',
            'from_date' =&gt; '2026-01-01',
            'to_date' =&gt; '2026-12-31',
            'sort_by' =&gt; 'created_at',
            'sort_order' =&gt; 'desc',
            'limit' =&gt; '10',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-users">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 45,
            &quot;name&quot;: &quot;Ms. Elisabeth Okuneva&quot;,
            &quot;email&quot;: &quot;gulgowski.asia@example.com&quot;,
            &quot;user_name&quot;: &quot;idickens&quot;,
            &quot;position&quot;: null,
            &quot;phone&quot;: null,
            &quot;zalo_id&quot;: null,
            &quot;status&quot;: &quot;inactive&quot;,
            &quot;created_by&quot;: &quot;N/A&quot;,
            &quot;updated_by&quot;: &quot;N/A&quot;,
            &quot;assignments&quot;: [],
            &quot;created_at&quot;: &quot;03:43:48 25/03/2026&quot;,
            &quot;updated_at&quot;: &quot;03:43:48 25/03/2026&quot;
        },
        {
            &quot;id&quot;: 46,
            &quot;name&quot;: &quot;Mya DuBuque&quot;,
            &quot;email&quot;: &quot;breitenberg.gilbert@example.com&quot;,
            &quot;user_name&quot;: &quot;price.amber&quot;,
            &quot;position&quot;: null,
            &quot;phone&quot;: null,
            &quot;zalo_id&quot;: null,
            &quot;status&quot;: &quot;inactive&quot;,
            &quot;created_by&quot;: &quot;N/A&quot;,
            &quot;updated_by&quot;: &quot;N/A&quot;,
            &quot;assignments&quot;: [],
            &quot;created_at&quot;: &quot;03:43:48 25/03/2026&quot;,
            &quot;updated_at&quot;: &quot;03:43:48 25/03/2026&quot;
        }
    ],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;/?page=1&quot;,
        &quot;last&quot;: &quot;/?page=1&quot;,
        &quot;prev&quot;: null,
        &quot;next&quot;: null
    },
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 1,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;/?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;page&quot;: 1,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;/&quot;,
        &quot;per_page&quot;: 10,
        &quot;to&quot;: 2,
        &quot;total&quot;: 2
    },
    &quot;success&quot;: &quot;true&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-users" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-users"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-users" data-method="GET"
      data-path="api/users"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-users', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-users"
                    onclick="tryItOut('GETapi-users');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-users"
                    onclick="cancelTryOut('GETapi-users');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-users"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/users</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-users"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="GETapi-users"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-users"
               value="john"
               data-component="query">
    <br>
<p>Từ khóa tìm kiếm (name, email, user_name). Example: <code>john</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="GETapi-users"
               value="architecto"
               data-component="query">
    <br>
<p>Lọc theo trạng thái: active, inactive, banned. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>from_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="from_date"                data-endpoint="GETapi-users"
               value="2026-01-01"
               data-component="query">
    <br>
<p>Lọc từ ngày tạo (Y-m-d). Must be a valid date. Example: <code>2026-01-01</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>to_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="to_date"                data-endpoint="GETapi-users"
               value="2026-12-31"
               data-component="query">
    <br>
<p>Lọc đến ngày tạo (Y-m-d). Must be a valid date. Must be a date after or equal to <code>from_date</code>. Example: <code>2026-12-31</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_by</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_by"                data-endpoint="GETapi-users"
               value="created_at"
               data-component="query">
    <br>
<p>Sắp xếp theo: id, name, email, user_name, created_at. Example: <code>created_at</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_order</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_order"                data-endpoint="GETapi-users"
               value="desc"
               data-component="query">
    <br>
<p>Thứ tự: asc, desc. Example: <code>desc</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETapi-users"
               value="10"
               data-component="query">
    <br>
<p>Số bản ghi mỗi trang (1-100). Example: <code>10</code></p>
            </div>
                </form>

                    <h2 id="core-user-GETapi-users--user_id-">Chi tiết người dùng</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-users--user_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/users/1" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/users/1"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/users/1';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-users--user_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 47,
        &quot;name&quot;: &quot;Morgan Hirthe&quot;,
        &quot;email&quot;: &quot;dare.emelie@example.com&quot;,
        &quot;user_name&quot;: &quot;imclaughlin&quot;,
        &quot;position&quot;: null,
        &quot;phone&quot;: null,
        &quot;zalo_id&quot;: null,
        &quot;status&quot;: &quot;inactive&quot;,
        &quot;created_by&quot;: &quot;N/A&quot;,
        &quot;updated_by&quot;: &quot;N/A&quot;,
        &quot;assignments&quot;: [],
        &quot;created_at&quot;: &quot;03:43:48 25/03/2026&quot;,
        &quot;updated_at&quot;: &quot;03:43:48 25/03/2026&quot;
    },
    &quot;success&quot;: &quot;true&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-users--user_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-users--user_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users--user_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-users--user_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users--user_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-users--user_id-" data-method="GET"
      data-path="api/users/{user_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-users--user_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-users--user_id-"
                    onclick="tryItOut('GETapi-users--user_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-users--user_id-"
                    onclick="cancelTryOut('GETapi-users--user_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-users--user_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/users/{user_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-users--user_id-"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="GETapi-users--user_id-"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-users--user_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-users--user_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="user_id"                data-endpoint="GETapi-users--user_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>user</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="user"                data-endpoint="GETapi-users--user_id-"
               value="1"
               data-component="url">
    <br>
<p>ID người dùng. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="core-user-POSTapi-users">Tạo người dùng mới</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-users">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/users" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Nguyễn Văn A\",
    \"email\": \"user@example.com\",
    \"user_name\": \"nguyenvana\",
    \"password\": \"password123\",
    \"status\": \"active\",
    \"assignments\": [
        \"architecto\"
    ],
    \"password_confirmation\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/users"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Nguyễn Văn A",
    "email": "user@example.com",
    "user_name": "nguyenvana",
    "password": "password123",
    "status": "active",
    "assignments": [
        "architecto"
    ],
    "password_confirmation": "architecto"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/users';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'Nguyễn Văn A',
            'email' =&gt; 'user@example.com',
            'user_name' =&gt; 'nguyenvana',
            'password' =&gt; 'password123',
            'status' =&gt; 'active',
            'assignments' =&gt; [
                'architecto',
            ],
            'password_confirmation' =&gt; 'architecto',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-users">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 48,
        &quot;name&quot;: &quot;Ms. Elisabeth Okuneva&quot;,
        &quot;email&quot;: &quot;idickens@example.org&quot;,
        &quot;user_name&quot;: &quot;aschuster&quot;,
        &quot;position&quot;: null,
        &quot;phone&quot;: null,
        &quot;zalo_id&quot;: null,
        &quot;status&quot;: &quot;active&quot;,
        &quot;created_by&quot;: &quot;N/A&quot;,
        &quot;updated_by&quot;: &quot;N/A&quot;,
        &quot;assignments&quot;: [],
        &quot;created_at&quot;: &quot;03:43:48 25/03/2026&quot;,
        &quot;updated_at&quot;: &quot;03:43:48 25/03/2026&quot;
    },
    &quot;success&quot;: &quot;true&quot;,
    &quot;message&quot;: &quot;T&agrave;i khoản đ&atilde; được tạo th&agrave;nh c&ocirc;ng!&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-users" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-users"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-users"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-users">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-users" data-method="POST"
      data-path="api/users"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-users', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-users"
                    onclick="tryItOut('POSTapi-users');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-users"
                    onclick="cancelTryOut('POSTapi-users');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-users"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/users</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-users"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="POSTapi-users"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-users"
               value="Nguyễn Văn A"
               data-component="body">
    <br>
<p>Tên người dùng. Example: <code>Nguyễn Văn A</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-users"
               value="user@example.com"
               data-component="body">
    <br>
<p>Email (duy nhất). Example: <code>user@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>user_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="user_name"                data-endpoint="POSTapi-users"
               value="nguyenvana"
               data-component="body">
    <br>
<p>Tên đăng nhập (không dấu cách, cho phép . <em> -). Must match the regex /^[a-zA-Z0-9.</em>-]*$/. Must not be greater than 100 characters. Example: <code>nguyenvana</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-users"
               value="password123"
               data-component="body">
    <br>
<p>Mật khẩu (tối thiểu 6 ký tự). Example: <code>password123</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="POSTapi-users"
               value="active"
               data-component="body">
    <br>
<p>Trạng thái: active, inactive, banned. Example: <code>active</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>assignments</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>
<p>Danh sách gán vai trò theo đơn vị. Ví dụ: [{"role_id":1,"department_ids":[2,3]},{"role_id":5,"department_ids":[9]}]</p>
            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>role_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="assignments.0.role_id"                data-endpoint="POSTapi-users"
               value="16"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the roles table. Example: <code>16</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>department_ids</code></b>&nbsp;&nbsp;
<small>integer[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="assignments.0.department_ids[0]"                data-endpoint="POSTapi-users"
               data-component="body">
        <input type="number" style="display: none"
               name="assignments.0.department_ids[1]"                data-endpoint="POSTapi-users"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the departments table.</p>
                    </div>
                                    </details>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password_confirmation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password_confirmation"                data-endpoint="POSTapi-users"
               value="architecto"
               data-component="body">
    <br>
<p>Xác nhận mật khẩu. Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="core-user-PUTapi-users--user_id-">Cập nhật người dùng</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-users--user_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/users/1" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"architecto\",
    \"email\": \"gbailey@example.net\",
    \"user_name\": \"nguyenvanb\",
    \"password\": \"|]|{+-\",
    \"status\": \"architecto\",
    \"assignments\": [
        \"architecto\"
    ],
    \"password_confirmation\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/users/1"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "architecto",
    "email": "gbailey@example.net",
    "user_name": "nguyenvanb",
    "password": "|]|{+-",
    "status": "architecto",
    "assignments": [
        "architecto"
    ],
    "password_confirmation": "architecto"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/users/1';
$response = $client-&gt;put(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'architecto',
            'email' =&gt; 'gbailey@example.net',
            'user_name' =&gt; 'nguyenvanb',
            'password' =&gt; '|]|{+-',
            'status' =&gt; 'architecto',
            'assignments' =&gt; [
                'architecto',
            ],
            'password_confirmation' =&gt; 'architecto',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-PUTapi-users--user_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 49,
        &quot;name&quot;: &quot;Ms. Elisabeth Okuneva&quot;,
        &quot;email&quot;: &quot;aschuster@example.com&quot;,
        &quot;user_name&quot;: &quot;gilbert32&quot;,
        &quot;position&quot;: null,
        &quot;phone&quot;: null,
        &quot;zalo_id&quot;: null,
        &quot;status&quot;: &quot;active&quot;,
        &quot;created_by&quot;: &quot;N/A&quot;,
        &quot;updated_by&quot;: &quot;N/A&quot;,
        &quot;assignments&quot;: [],
        &quot;created_at&quot;: &quot;03:43:48 25/03/2026&quot;,
        &quot;updated_at&quot;: &quot;03:43:48 25/03/2026&quot;
    },
    &quot;success&quot;: &quot;true&quot;,
    &quot;message&quot;: &quot;T&agrave;i khoản đ&atilde; được cập nhật!&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-users--user_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-users--user_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-users--user_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-users--user_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-users--user_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-users--user_id-" data-method="PUT"
      data-path="api/users/{user_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-users--user_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-users--user_id-"
                    onclick="tryItOut('PUTapi-users--user_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-users--user_id-"
                    onclick="cancelTryOut('PUTapi-users--user_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-users--user_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/users/{user_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-users--user_id-"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="PUTapi-users--user_id-"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-users--user_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-users--user_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="user_id"                data-endpoint="PUTapi-users--user_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>user</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="user"                data-endpoint="PUTapi-users--user_id-"
               value="1"
               data-component="url">
    <br>
<p>ID người dùng. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-users--user_id-"
               value="architecto"
               data-component="body">
    <br>
<p>Tên người dùng. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="PUTapi-users--user_id-"
               value="gbailey@example.net"
               data-component="body">
    <br>
<p>Email (duy nhất). Example: <code>gbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>user_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="user_name"                data-endpoint="PUTapi-users--user_id-"
               value="nguyenvanb"
               data-component="body">
    <br>
<p>Tên đăng nhập (không dấu cách, cho phép . <em> -). Must match the regex /^[a-zA-Z0-9.</em>-]*$/. Must not be greater than 100 characters. Example: <code>nguyenvanb</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="PUTapi-users--user_id-"
               value="|]|{+-"
               data-component="body">
    <br>
<p>Mật khẩu mới (nếu muốn đổi). Example: <code>|]|{+-</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PUTapi-users--user_id-"
               value="architecto"
               data-component="body">
    <br>
<p>Trạng thái: active, inactive, banned. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>assignments</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>
<p>Danh sách gán vai trò theo đơn vị. Khi gửi field này, hệ thống sẽ đồng bộ lại toàn bộ phân quyền của user.</p>
            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>role_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="assignments.0.role_id"                data-endpoint="PUTapi-users--user_id-"
               value="16"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the roles table. Example: <code>16</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>department_ids</code></b>&nbsp;&nbsp;
<small>integer[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="assignments.0.department_ids[0]"                data-endpoint="PUTapi-users--user_id-"
               data-component="body">
        <input type="number" style="display: none"
               name="assignments.0.department_ids[1]"                data-endpoint="PUTapi-users--user_id-"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the departments table.</p>
                    </div>
                                    </details>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password_confirmation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password_confirmation"                data-endpoint="PUTapi-users--user_id-"
               value="architecto"
               data-component="body">
    <br>
<p>Xác nhận mật khẩu. Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="core-user-PATCHapi-users--user_id-">Cập nhật người dùng</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PATCHapi-users--user_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost:8000/api/users/1" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"architecto\",
    \"email\": \"gbailey@example.net\",
    \"user_name\": \"nguyenvanb\",
    \"password\": \"|]|{+-\",
    \"status\": \"architecto\",
    \"assignments\": [
        \"architecto\"
    ],
    \"password_confirmation\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/users/1"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "architecto",
    "email": "gbailey@example.net",
    "user_name": "nguyenvanb",
    "password": "|]|{+-",
    "status": "architecto",
    "assignments": [
        "architecto"
    ],
    "password_confirmation": "architecto"
};

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/users/1';
$response = $client-&gt;patch(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'architecto',
            'email' =&gt; 'gbailey@example.net',
            'user_name' =&gt; 'nguyenvanb',
            'password' =&gt; '|]|{+-',
            'status' =&gt; 'architecto',
            'assignments' =&gt; [
                'architecto',
            ],
            'password_confirmation' =&gt; 'architecto',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-PATCHapi-users--user_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 50,
        &quot;name&quot;: &quot;Ms. Elisabeth Okuneva&quot;,
        &quot;email&quot;: &quot;gilbert32@example.com&quot;,
        &quot;user_name&quot;: &quot;hirthe.theo&quot;,
        &quot;position&quot;: null,
        &quot;phone&quot;: null,
        &quot;zalo_id&quot;: null,
        &quot;status&quot;: &quot;active&quot;,
        &quot;created_by&quot;: &quot;N/A&quot;,
        &quot;updated_by&quot;: &quot;N/A&quot;,
        &quot;assignments&quot;: [],
        &quot;created_at&quot;: &quot;03:43:48 25/03/2026&quot;,
        &quot;updated_at&quot;: &quot;03:43:48 25/03/2026&quot;
    },
    &quot;success&quot;: &quot;true&quot;,
    &quot;message&quot;: &quot;T&agrave;i khoản đ&atilde; được cập nhật!&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PATCHapi-users--user_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-users--user_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-users--user_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHapi-users--user_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-users--user_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHapi-users--user_id-" data-method="PATCH"
      data-path="api/users/{user_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-users--user_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-users--user_id-"
                    onclick="tryItOut('PATCHapi-users--user_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-users--user_id-"
                    onclick="cancelTryOut('PATCHapi-users--user_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-users--user_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/users/{user_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PATCHapi-users--user_id-"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="PATCHapi-users--user_id-"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHapi-users--user_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHapi-users--user_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="user_id"                data-endpoint="PATCHapi-users--user_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>user</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="user"                data-endpoint="PATCHapi-users--user_id-"
               value="1"
               data-component="url">
    <br>
<p>ID người dùng. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PATCHapi-users--user_id-"
               value="architecto"
               data-component="body">
    <br>
<p>Tên người dùng. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="PATCHapi-users--user_id-"
               value="gbailey@example.net"
               data-component="body">
    <br>
<p>Email (duy nhất). Example: <code>gbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>user_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="user_name"                data-endpoint="PATCHapi-users--user_id-"
               value="nguyenvanb"
               data-component="body">
    <br>
<p>Tên đăng nhập (không dấu cách, cho phép . <em> -). Must match the regex /^[a-zA-Z0-9.</em>-]*$/. Must not be greater than 100 characters. Example: <code>nguyenvanb</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="PATCHapi-users--user_id-"
               value="|]|{+-"
               data-component="body">
    <br>
<p>Mật khẩu mới (nếu muốn đổi). Example: <code>|]|{+-</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PATCHapi-users--user_id-"
               value="architecto"
               data-component="body">
    <br>
<p>Trạng thái: active, inactive, banned. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>assignments</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>
<p>Danh sách gán vai trò theo đơn vị. Khi gửi field này, hệ thống sẽ đồng bộ lại toàn bộ phân quyền của user.</p>
            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>role_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="assignments.0.role_id"                data-endpoint="PATCHapi-users--user_id-"
               value="16"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the roles table. Example: <code>16</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>department_ids</code></b>&nbsp;&nbsp;
<small>integer[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="assignments.0.department_ids[0]"                data-endpoint="PATCHapi-users--user_id-"
               data-component="body">
        <input type="number" style="display: none"
               name="assignments.0.department_ids[1]"                data-endpoint="PATCHapi-users--user_id-"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the departments table.</p>
                    </div>
                                    </details>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password_confirmation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password_confirmation"                data-endpoint="PATCHapi-users--user_id-"
               value="architecto"
               data-component="body">
    <br>
<p>Xác nhận mật khẩu. Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="core-user-DELETEapi-users--user_id-">Xóa người dùng</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-users--user_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/users/1" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/users/1"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/users/1';
$response = $client-&gt;delete(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-DELETEapi-users--user_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;T&agrave;i khoản đ&atilde; được x&oacute;a th&agrave;nh c&ocirc;ng!&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-users--user_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-users--user_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-users--user_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-users--user_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-users--user_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-users--user_id-" data-method="DELETE"
      data-path="api/users/{user_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-users--user_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-users--user_id-"
                    onclick="tryItOut('DELETEapi-users--user_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-users--user_id-"
                    onclick="cancelTryOut('DELETEapi-users--user_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-users--user_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/users/{user_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-users--user_id-"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="DELETEapi-users--user_id-"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-users--user_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-users--user_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="user_id"                data-endpoint="DELETEapi-users--user_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>user</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="user"                data-endpoint="DELETEapi-users--user_id-"
               value="1"
               data-component="url">
    <br>
<p>ID người dùng. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="core-user-PATCHapi-users--user_id--status">Thay đổi trạng thái người dùng</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PATCHapi-users--user_id--status">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost:8000/api/users/1/status" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"status\": \"active\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/users/1/status"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "status": "active"
};

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/users/1/status';
$response = $client-&gt;patch(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'status' =&gt; 'active',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-PATCHapi-users--user_id--status">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 51,
        &quot;name&quot;: &quot;Morgan Hirthe&quot;,
        &quot;email&quot;: &quot;imclaughlin@example.org&quot;,
        &quot;user_name&quot;: &quot;okeefe.isidro&quot;,
        &quot;position&quot;: null,
        &quot;phone&quot;: null,
        &quot;zalo_id&quot;: null,
        &quot;status&quot;: &quot;inactive&quot;,
        &quot;created_by&quot;: &quot;N/A&quot;,
        &quot;updated_by&quot;: &quot;N/A&quot;,
        &quot;assignments&quot;: [],
        &quot;created_at&quot;: &quot;03:43:48 25/03/2026&quot;,
        &quot;updated_at&quot;: &quot;03:43:48 25/03/2026&quot;
    },
    &quot;success&quot;: &quot;true&quot;,
    &quot;message&quot;: &quot;Cập nhật trạng th&aacute;i th&agrave;nh c&ocirc;ng!&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PATCHapi-users--user_id--status" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-users--user_id--status"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-users--user_id--status"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHapi-users--user_id--status" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-users--user_id--status">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHapi-users--user_id--status" data-method="PATCH"
      data-path="api/users/{user_id}/status"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-users--user_id--status', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-users--user_id--status"
                    onclick="tryItOut('PATCHapi-users--user_id--status');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-users--user_id--status"
                    onclick="cancelTryOut('PATCHapi-users--user_id--status');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-users--user_id--status"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/users/{user_id}/status</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PATCHapi-users--user_id--status"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="PATCHapi-users--user_id--status"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHapi-users--user_id--status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHapi-users--user_id--status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="user_id"                data-endpoint="PATCHapi-users--user_id--status"
               value="1"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>user</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="user"                data-endpoint="PATCHapi-users--user_id--status"
               value="1"
               data-component="url">
    <br>
<p>ID người dùng. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PATCHapi-users--user_id--status"
               value="active"
               data-component="body">
    <br>
<p>Trạng thái mới: active, inactive, banned. Example: <code>active</code></p>
        </div>
        </form>

                <h1 id="schedule-lich-cong-tac">Schedule - Lịch công tác</h1>

    

                                <h2 id="schedule-lich-cong-tac-GETapi-schedules-public">Lịch công tác công khai</h2>

<p>
</p>

<p>Trả về danh sách lịch công tác đang hoạt động cho hiển thị công khai.</p>

<span id="example-requests-GETapi-schedules-public">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/schedules/public?search=van-ban&amp;status=active&amp;from_date=2026-04-01&amp;to_date=2026-04-30&amp;sort_by=created_at&amp;sort_order=desc&amp;limit=20&amp;department_id=16&amp;session=architecto" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/schedules/public"
);

const params = {
    "search": "van-ban",
    "status": "active",
    "from_date": "2026-04-01",
    "to_date": "2026-04-30",
    "sort_by": "created_at",
    "sort_order": "desc",
    "limit": "20",
    "department_id": "16",
    "session": "architecto",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/schedules/public';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'search' =&gt; 'van-ban',
            'status' =&gt; 'active',
            'from_date' =&gt; '2026-04-01',
            'to_date' =&gt; '2026-04-30',
            'sort_by' =&gt; 'created_at',
            'sort_order' =&gt; 'desc',
            'limit' =&gt; '20',
            'department_id' =&gt; '16',
            'session' =&gt; 'architecto',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-schedules-public">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;http://localhost:8000/api/schedules/public?page=1&quot;,
        &quot;last&quot;: &quot;http://localhost:8000/api/schedules/public?page=1&quot;,
        &quot;prev&quot;: null,
        &quot;next&quot;: null
    },
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;from&quot;: null,
        &quot;last_page&quot;: 1,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8000/api/schedules/public?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;page&quot;: 1,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;http://localhost:8000/api/schedules/public&quot;,
        &quot;per_page&quot;: 20,
        &quot;to&quot;: null,
        &quot;total&quot;: 0
    },
    &quot;success&quot;: true
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-schedules-public" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-schedules-public"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-schedules-public"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-schedules-public" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-schedules-public">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-schedules-public" data-method="GET"
      data-path="api/schedules/public"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-schedules-public', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-schedules-public"
                    onclick="tryItOut('GETapi-schedules-public');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-schedules-public"
                    onclick="cancelTryOut('GETapi-schedules-public');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-schedules-public"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/schedules/public</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="GETapi-schedules-public"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-schedules-public"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-schedules-public"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-schedules-public"
               value="van-ban"
               data-component="query">
    <br>
<p>Từ khóa tìm kiếm theo tên hoặc trường chính. Must not be greater than 100 characters. Example: <code>van-ban</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="GETapi-schedules-public"
               value="active"
               data-component="query">
    <br>
<p>Lọc theo trạng thái. Example: <code>active</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>from_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="from_date"                data-endpoint="GETapi-schedules-public"
               value="2026-04-01"
               data-component="query">
    <br>
<p>date Lọc từ ngày (Y-m-d). Example: <code>2026-04-01</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>to_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="to_date"                data-endpoint="GETapi-schedules-public"
               value="2026-04-30"
               data-component="query">
    <br>
<p>date Lọc đến ngày (Y-m-d). Example: <code>2026-04-30</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_by</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_by"                data-endpoint="GETapi-schedules-public"
               value="created_at"
               data-component="query">
    <br>
<p>Trường dùng để sắp xếp. Must not be greater than 50 characters. Example: <code>created_at</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_order</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_order"                data-endpoint="GETapi-schedules-public"
               value="desc"
               data-component="query">
    <br>
<p>Thứ tự sắp xếp. Example: <code>desc</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>asc</code></li> <li><code>desc</code></li></ul>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETapi-schedules-public"
               value="20"
               data-component="query">
    <br>
<p>Số bản ghi mỗi trang (1-100). Example: <code>20</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>department_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="department_id"                data-endpoint="GETapi-schedules-public"
               value="16"
               data-component="query">
    <br>
<p>ID đơn vị. Example: <code>16</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>session</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="session"                data-endpoint="GETapi-schedules-public"
               value="architecto"
               data-component="query">
    <br>
<p>Buổi: sang, chieu, toi. Example: <code>architecto</code></p>
            </div>
                </form>

                    <h2 id="schedule-lich-cong-tac-GETapi-schedules-export">Xuất Excel lịch công tác</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Xuất ra các trường: id, ngày, buổi, thời gian, nội dung, chủ trì, thành phần, địa điểm, đơn vị chuẩn bị, số người, loại cuộc họp, tính chất, lái xe, mã màu, khối, trạng thái, người tạo, người sửa, ngày tạo, ngày cập nhật.</p>

<span id="example-requests-GETapi-schedules-export">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/schedules/export?search=architecto&amp;status=architecto&amp;from_date=architecto&amp;to_date=architecto&amp;sort_by=created_at&amp;sort_order=desc&amp;limit=10&amp;department_id=16" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/schedules/export"
);

const params = {
    "search": "architecto",
    "status": "architecto",
    "from_date": "architecto",
    "to_date": "architecto",
    "sort_by": "created_at",
    "sort_order": "desc",
    "limit": "10",
    "department_id": "16",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/schedules/export';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'search' =&gt; 'architecto',
            'status' =&gt; 'architecto',
            'from_date' =&gt; 'architecto',
            'to_date' =&gt; 'architecto',
            'sort_by' =&gt; 'created_at',
            'sort_order' =&gt; 'desc',
            'limit' =&gt; '10',
            'department_id' =&gt; '16',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-schedules-export">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-schedules-export" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-schedules-export"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-schedules-export"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-schedules-export" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-schedules-export">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-schedules-export" data-method="GET"
      data-path="api/schedules/export"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-schedules-export', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-schedules-export"
                    onclick="tryItOut('GETapi-schedules-export');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-schedules-export"
                    onclick="cancelTryOut('GETapi-schedules-export');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-schedules-export"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/schedules/export</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-schedules-export"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="GETapi-schedules-export"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-schedules-export"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-schedules-export"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-schedules-export"
               value="architecto"
               data-component="query">
    <br>
<p>Tìm kiếm theo nội dung. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="GETapi-schedules-export"
               value="architecto"
               data-component="query">
    <br>
<p>Trạng thái: active, inactive. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>from_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="from_date"                data-endpoint="GETapi-schedules-export"
               value="architecto"
               data-component="query">
    <br>
<p>date Lọc từ ngày (Y-m-d). Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>to_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="to_date"                data-endpoint="GETapi-schedules-export"
               value="architecto"
               data-component="query">
    <br>
<p>date Lọc đến ngày (Y-m-d). Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_by</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_by"                data-endpoint="GETapi-schedules-export"
               value="created_at"
               data-component="query">
    <br>
<p>Trường dùng để sắp xếp. Must not be greater than 50 characters. Example: <code>created_at</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_order</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_order"                data-endpoint="GETapi-schedules-export"
               value="desc"
               data-component="query">
    <br>
<p>Thứ tự sắp xếp. Example: <code>desc</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>asc</code></li> <li><code>desc</code></li></ul>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETapi-schedules-export"
               value="10"
               data-component="query">
    <br>
<p>Số bản ghi mỗi trang (1-100). Must be at least 1. Must not be greater than 100. Example: <code>10</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>department_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="department_id"                data-endpoint="GETapi-schedules-export"
               value="16"
               data-component="query">
    <br>
<p>ID đơn vị. Example: <code>16</code></p>
            </div>
                </form>

                    <h2 id="schedule-lich-cong-tac-GETapi-schedules-export-pdf">Xuất PDF lịch công tác</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Xuất lịch công tác ra file PDF theo bộ lọc.</p>

<span id="example-requests-GETapi-schedules-export-pdf">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/schedules/export-pdf?search=van-ban&amp;status=active&amp;from_date=architecto&amp;to_date=architecto&amp;sort_by=created_at&amp;sort_order=desc&amp;limit=10&amp;department_id=16&amp;session=architecto" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/schedules/export-pdf"
);

const params = {
    "search": "van-ban",
    "status": "active",
    "from_date": "architecto",
    "to_date": "architecto",
    "sort_by": "created_at",
    "sort_order": "desc",
    "limit": "10",
    "department_id": "16",
    "session": "architecto",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/schedules/export-pdf';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'search' =&gt; 'van-ban',
            'status' =&gt; 'active',
            'from_date' =&gt; 'architecto',
            'to_date' =&gt; 'architecto',
            'sort_by' =&gt; 'created_at',
            'sort_order' =&gt; 'desc',
            'limit' =&gt; '10',
            'department_id' =&gt; '16',
            'session' =&gt; 'architecto',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-schedules-export-pdf">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-schedules-export-pdf" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-schedules-export-pdf"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-schedules-export-pdf"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-schedules-export-pdf" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-schedules-export-pdf">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-schedules-export-pdf" data-method="GET"
      data-path="api/schedules/export-pdf"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-schedules-export-pdf', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-schedules-export-pdf"
                    onclick="tryItOut('GETapi-schedules-export-pdf');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-schedules-export-pdf"
                    onclick="cancelTryOut('GETapi-schedules-export-pdf');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-schedules-export-pdf"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/schedules/export-pdf</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-schedules-export-pdf"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="GETapi-schedules-export-pdf"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-schedules-export-pdf"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-schedules-export-pdf"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-schedules-export-pdf"
               value="van-ban"
               data-component="query">
    <br>
<p>Từ khóa tìm kiếm theo tên hoặc trường chính. Must not be greater than 100 characters. Example: <code>van-ban</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="GETapi-schedules-export-pdf"
               value="active"
               data-component="query">
    <br>
<p>Lọc theo trạng thái. Example: <code>active</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>from_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="from_date"                data-endpoint="GETapi-schedules-export-pdf"
               value="architecto"
               data-component="query">
    <br>
<p>date Lọc từ ngày (Y-m-d). Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>to_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="to_date"                data-endpoint="GETapi-schedules-export-pdf"
               value="architecto"
               data-component="query">
    <br>
<p>date Lọc đến ngày (Y-m-d). Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_by</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_by"                data-endpoint="GETapi-schedules-export-pdf"
               value="created_at"
               data-component="query">
    <br>
<p>Trường dùng để sắp xếp. Must not be greater than 50 characters. Example: <code>created_at</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_order</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_order"                data-endpoint="GETapi-schedules-export-pdf"
               value="desc"
               data-component="query">
    <br>
<p>Thứ tự sắp xếp. Example: <code>desc</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>asc</code></li> <li><code>desc</code></li></ul>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETapi-schedules-export-pdf"
               value="10"
               data-component="query">
    <br>
<p>Số bản ghi mỗi trang (1-100). Must be at least 1. Must not be greater than 100. Example: <code>10</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>department_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="department_id"                data-endpoint="GETapi-schedules-export-pdf"
               value="16"
               data-component="query">
    <br>
<p>ID đơn vị. Example: <code>16</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>session</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="session"                data-endpoint="GETapi-schedules-export-pdf"
               value="architecto"
               data-component="query">
    <br>
<p>Buổi: sang, chieu, toi. Example: <code>architecto</code></p>
            </div>
                </form>

                    <h2 id="schedule-lich-cong-tac-POSTapi-schedules-import">Nhập Excel lịch công tác</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Cột bắt buộc: noi_dung, ngay, buoi. Cột không bắt buộc: thoi_gian, dia_diem, don_vi_chuan_bi, lai_xe, so_nguoi, ma_mau, khoi (mặc định "thuong_trac"), trang_thai (mặc định "active").</p>

<span id="example-requests-POSTapi-schedules-import">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/schedules/import" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "file=@/tmp/phpkfsl5403a1vtdnzNmHU" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/schedules/import"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('file', document.querySelector('input[name="file"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/schedules/import';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'multipart/form-data',
            'Accept' =&gt; 'application/json',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'file',
                'contents' =&gt; fopen('/tmp/phpkfsl5403a1vtdnzNmHU', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-schedules-import">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Import lịch c&ocirc;ng t&aacute;c th&agrave;nh c&ocirc;ng.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-schedules-import" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-schedules-import"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-schedules-import"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-schedules-import" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-schedules-import">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-schedules-import" data-method="POST"
      data-path="api/schedules/import"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-schedules-import', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-schedules-import"
                    onclick="tryItOut('POSTapi-schedules-import');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-schedules-import"
                    onclick="cancelTryOut('POSTapi-schedules-import');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-schedules-import"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/schedules/import</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-schedules-import"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="POSTapi-schedules-import"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-schedules-import"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-schedules-import"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>file</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="file"                data-endpoint="POSTapi-schedules-import"
               value=""
               data-component="body">
    <br>
<p>File Excel (xlsx, xls, csv). Example: <code>/tmp/phpkfsl5403a1vtdnzNmHU</code></p>
        </div>
        </form>

                    <h2 id="schedule-lich-cong-tac-POSTapi-schedules-bulk-delete">Xóa hàng loạt lịch công tác</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-schedules-bulk-delete">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/schedules/bulk-delete" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"ids\": [
        1,
        2,
        3
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/schedules/bulk-delete"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "ids": [
        1,
        2,
        3
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/schedules/bulk-delete';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'ids' =&gt; [
                1,
                2,
                3,
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-schedules-bulk-delete">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Đ&atilde; x&oacute;a th&agrave;nh c&ocirc;ng c&aacute;c lịch được chọn!&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-schedules-bulk-delete" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-schedules-bulk-delete"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-schedules-bulk-delete"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-schedules-bulk-delete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-schedules-bulk-delete">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-schedules-bulk-delete" data-method="POST"
      data-path="api/schedules/bulk-delete"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-schedules-bulk-delete', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-schedules-bulk-delete"
                    onclick="tryItOut('POSTapi-schedules-bulk-delete');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-schedules-bulk-delete"
                    onclick="cancelTryOut('POSTapi-schedules-bulk-delete');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-schedules-bulk-delete"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/schedules/bulk-delete</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-schedules-bulk-delete"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="POSTapi-schedules-bulk-delete"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-schedules-bulk-delete"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-schedules-bulk-delete"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ids</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ids[0]"                data-endpoint="POSTapi-schedules-bulk-delete"
               data-component="body">
        <input type="text" style="display: none"
               name="ids[1]"                data-endpoint="POSTapi-schedules-bulk-delete"
               data-component="body">
    <br>
<p>Danh sách ID.</p>
        </div>
        </form>

                    <h2 id="schedule-lich-cong-tac-PATCHapi-schedules-bulk-status">Cập nhật trạng thái hàng loạt</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PATCHapi-schedules-bulk-status">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost:8000/api/schedules/bulk-status" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"ids\": [
        1,
        2,
        3
    ],
    \"status\": \"active\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/schedules/bulk-status"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "ids": [
        1,
        2,
        3
    ],
    "status": "active"
};

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/schedules/bulk-status';
$response = $client-&gt;patch(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'ids' =&gt; [
                1,
                2,
                3,
            ],
            'status' =&gt; 'active',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-PATCHapi-schedules-bulk-status">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Cập nhật trạng th&aacute;i h&agrave;ng loạt th&agrave;nh c&ocirc;ng!&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PATCHapi-schedules-bulk-status" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-schedules-bulk-status"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-schedules-bulk-status"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHapi-schedules-bulk-status" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-schedules-bulk-status">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHapi-schedules-bulk-status" data-method="PATCH"
      data-path="api/schedules/bulk-status"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-schedules-bulk-status', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-schedules-bulk-status"
                    onclick="tryItOut('PATCHapi-schedules-bulk-status');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-schedules-bulk-status"
                    onclick="cancelTryOut('PATCHapi-schedules-bulk-status');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-schedules-bulk-status"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/schedules/bulk-status</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PATCHapi-schedules-bulk-status"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="PATCHapi-schedules-bulk-status"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHapi-schedules-bulk-status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHapi-schedules-bulk-status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ids</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ids[0]"                data-endpoint="PATCHapi-schedules-bulk-status"
               data-component="body">
        <input type="text" style="display: none"
               name="ids[1]"                data-endpoint="PATCHapi-schedules-bulk-status"
               data-component="body">
    <br>
<p>Danh sách ID.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PATCHapi-schedules-bulk-status"
               value="active"
               data-component="body">
    <br>
<p>Trạng thái mới: active, inactive. Example: <code>active</code></p>
        </div>
        </form>

                    <h2 id="schedule-lich-cong-tac-GETapi-schedules-stats">Thống kê lịch công tác</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Tổng số lịch, số lịch đang hoạt động, không hoạt động (áp dụng bộ lọc).</p>

<span id="example-requests-GETapi-schedules-stats">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/schedules/stats?search=architecto&amp;status=architecto&amp;from_date=2026-04-01&amp;to_date=2026-04-30&amp;sort_by=created_at&amp;sort_order=desc&amp;limit=10&amp;department_id=16" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/schedules/stats"
);

const params = {
    "search": "architecto",
    "status": "architecto",
    "from_date": "2026-04-01",
    "to_date": "2026-04-30",
    "sort_by": "created_at",
    "sort_order": "desc",
    "limit": "10",
    "department_id": "16",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/schedules/stats';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'search' =&gt; 'architecto',
            'status' =&gt; 'architecto',
            'from_date' =&gt; '2026-04-01',
            'to_date' =&gt; '2026-04-30',
            'sort_by' =&gt; 'created_at',
            'sort_order' =&gt; 'desc',
            'limit' =&gt; '10',
            'department_id' =&gt; '16',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-schedules-stats">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;total&quot;: 50,
        &quot;active&quot;: 45,
        &quot;inactive&quot;: 5
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-schedules-stats" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-schedules-stats"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-schedules-stats"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-schedules-stats" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-schedules-stats">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-schedules-stats" data-method="GET"
      data-path="api/schedules/stats"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-schedules-stats', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-schedules-stats"
                    onclick="tryItOut('GETapi-schedules-stats');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-schedules-stats"
                    onclick="cancelTryOut('GETapi-schedules-stats');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-schedules-stats"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/schedules/stats</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-schedules-stats"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="GETapi-schedules-stats"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-schedules-stats"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-schedules-stats"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-schedules-stats"
               value="architecto"
               data-component="query">
    <br>
<p>Từ khóa tìm kiếm theo nội dung. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="GETapi-schedules-stats"
               value="architecto"
               data-component="query">
    <br>
<p>Trạng thái: active, inactive. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>from_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="from_date"                data-endpoint="GETapi-schedules-stats"
               value="2026-04-01"
               data-component="query">
    <br>
<p>date Lọc từ ngày (Y-m-d). Example: <code>2026-04-01</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>to_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="to_date"                data-endpoint="GETapi-schedules-stats"
               value="2026-04-30"
               data-component="query">
    <br>
<p>date Lọc đến ngày (Y-m-d). Example: <code>2026-04-30</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_by</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_by"                data-endpoint="GETapi-schedules-stats"
               value="created_at"
               data-component="query">
    <br>
<p>Trường dùng để sắp xếp. Must not be greater than 50 characters. Example: <code>created_at</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_order</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_order"                data-endpoint="GETapi-schedules-stats"
               value="desc"
               data-component="query">
    <br>
<p>Thứ tự sắp xếp. Example: <code>desc</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>asc</code></li> <li><code>desc</code></li></ul>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETapi-schedules-stats"
               value="10"
               data-component="query">
    <br>
<p>Số bản ghi mỗi trang (1-100). Must be at least 1. Must not be greater than 100. Example: <code>10</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>department_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="department_id"                data-endpoint="GETapi-schedules-stats"
               value="16"
               data-component="query">
    <br>
<p>ID đơn vị. Example: <code>16</code></p>
            </div>
                </form>

                    <h2 id="schedule-lich-cong-tac-GETapi-schedules">Danh sách lịch công tác</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Lấy danh sách có phân trang, lọc thông minh và sắp xếp.</p>

<span id="example-requests-GETapi-schedules">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/schedules?search=architecto&amp;status=architecto&amp;from_date=architecto&amp;to_date=architecto&amp;sort_by=sort_order&amp;sort_order=desc&amp;limit=20&amp;event_date=architecto&amp;session=architecto&amp;department_id=16&amp;chairperson_id=16&amp;meeting_type=architecto&amp;nature=architecto&amp;position=architecto&amp;participant_user_id=16&amp;sort_dir=asc" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/schedules"
);

const params = {
    "search": "architecto",
    "status": "architecto",
    "from_date": "architecto",
    "to_date": "architecto",
    "sort_by": "sort_order",
    "sort_order": "desc",
    "limit": "20",
    "event_date": "architecto",
    "session": "architecto",
    "department_id": "16",
    "chairperson_id": "16",
    "meeting_type": "architecto",
    "nature": "architecto",
    "position": "architecto",
    "participant_user_id": "16",
    "sort_dir": "asc",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/schedules';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'search' =&gt; 'architecto',
            'status' =&gt; 'architecto',
            'from_date' =&gt; 'architecto',
            'to_date' =&gt; 'architecto',
            'sort_by' =&gt; 'sort_order',
            'sort_order' =&gt; 'desc',
            'limit' =&gt; '20',
            'event_date' =&gt; 'architecto',
            'session' =&gt; 'architecto',
            'department_id' =&gt; '16',
            'chairperson_id' =&gt; '16',
            'meeting_type' =&gt; 'architecto',
            'nature' =&gt; 'architecto',
            'position' =&gt; 'architecto',
            'participant_user_id' =&gt; '16',
            'sort_dir' =&gt; 'asc',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-schedules">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: null,
            &quot;event_date&quot;: &quot;16/04/2026&quot;,
            &quot;session&quot;: &quot;chieu&quot;,
            &quot;start_time&quot;: &quot;08:01&quot;,
            &quot;content&quot;: &quot;Dolores enim non facere tempora.&quot;,
            &quot;location&quot;: &quot;47809 Considine Landing Suite 782\nNitzschetown, CA 87335-0574&quot;,
            &quot;prep_unit&quot;: &quot;Schaden, King and Fahey&quot;,
            &quot;driver_info&quot;: &quot;Prof. Carson Emard&quot;,
            &quot;color_code&quot;: null,
            &quot;sort_order&quot;: 6,
            &quot;department_id&quot;: null,
            &quot;status&quot;: &quot;active&quot;,
            &quot;meeting_type&quot;: &quot;hop_dot_xuat&quot;,
            &quot;meeting_type_label&quot;: &quot;Họp đột xuất&quot;,
            &quot;nature&quot;: &quot;mat&quot;,
            &quot;nature_label&quot;: &quot;Mật&quot;,
            &quot;created_by&quot;: &quot;N/A&quot;,
            &quot;updated_by&quot;: &quot;N/A&quot;,
            &quot;created_at&quot;: null,
            &quot;updated_at&quot;: null
        },
        {
            &quot;id&quot;: null,
            &quot;event_date&quot;: &quot;16/04/2026&quot;,
            &quot;session&quot;: &quot;sang&quot;,
            &quot;start_time&quot;: &quot;21:28&quot;,
            &quot;content&quot;: &quot;Quia perspiciatis deserunt ducimus corrupti et.&quot;,
            &quot;location&quot;: null,
            &quot;prep_unit&quot;: null,
            &quot;driver_info&quot;: null,
            &quot;color_code&quot;: null,
            &quot;sort_order&quot;: 71,
            &quot;department_id&quot;: null,
            &quot;status&quot;: &quot;active&quot;,
            &quot;meeting_type&quot;: &quot;hop_chuyen_de&quot;,
            &quot;meeting_type_label&quot;: &quot;Họp chuy&ecirc;n đề&quot;,
            &quot;nature&quot;: &quot;mat&quot;,
            &quot;nature_label&quot;: &quot;Mật&quot;,
            &quot;created_by&quot;: &quot;N/A&quot;,
            &quot;updated_by&quot;: &quot;N/A&quot;,
            &quot;created_at&quot;: null,
            &quot;updated_at&quot;: null
        }
    ],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;/?page=1&quot;,
        &quot;last&quot;: &quot;/?page=1&quot;,
        &quot;prev&quot;: null,
        &quot;next&quot;: null
    },
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 1,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;/?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;page&quot;: 1,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;/&quot;,
        &quot;per_page&quot;: 20,
        &quot;to&quot;: 2,
        &quot;total&quot;: 2
    },
    &quot;success&quot;: &quot;true&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-schedules" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-schedules"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-schedules"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-schedules" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-schedules">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-schedules" data-method="GET"
      data-path="api/schedules"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-schedules', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-schedules"
                    onclick="tryItOut('GETapi-schedules');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-schedules"
                    onclick="cancelTryOut('GETapi-schedules');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-schedules"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/schedules</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-schedules"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="GETapi-schedules"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-schedules"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-schedules"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-schedules"
               value="architecto"
               data-component="query">
    <br>
<p>Tìm kiếm theo nội dung. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="GETapi-schedules"
               value="architecto"
               data-component="query">
    <br>
<p>Trạng thái: active, inactive. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>from_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="from_date"                data-endpoint="GETapi-schedules"
               value="architecto"
               data-component="query">
    <br>
<p>date Lọc từ ngày (Y-m-d). Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>to_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="to_date"                data-endpoint="GETapi-schedules"
               value="architecto"
               data-component="query">
    <br>
<p>date Lọc đến ngày (Y-m-d). Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_by</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_by"                data-endpoint="GETapi-schedules"
               value="sort_order"
               data-component="query">
    <br>
<p>Sắp xếp theo: id, event_date, start_time, sort_order, created_at, updated_at. Example: <code>sort_order</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_order</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_order"                data-endpoint="GETapi-schedules"
               value="desc"
               data-component="query">
    <br>
<p>Thứ tự sắp xếp. Example: <code>desc</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>asc</code></li> <li><code>desc</code></li></ul>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETapi-schedules"
               value="20"
               data-component="query">
    <br>
<p>Số bản ghi mỗi trang (1-100). Example: <code>20</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>event_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="event_date"                data-endpoint="GETapi-schedules"
               value="architecto"
               data-component="query">
    <br>
<p>date Lọc theo ngày cụ thể (Y-m-d). Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>session</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="session"                data-endpoint="GETapi-schedules"
               value="architecto"
               data-component="query">
    <br>
<p>Buổi: sang, chieu, toi. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>department_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="department_id"                data-endpoint="GETapi-schedules"
               value="16"
               data-component="query">
    <br>
<p>ID đơn vị. Example: <code>16</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>chairperson_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="chairperson_id"                data-endpoint="GETapi-schedules"
               value="16"
               data-component="query">
    <br>
<p>Lọc theo chủ trì. Example: <code>16</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>meeting_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="meeting_type"                data-endpoint="GETapi-schedules"
               value="architecto"
               data-component="query">
    <br>
<p>Lọc theo loại cuộc họp: hop_thuong_ky, hop_dot_xuat, hop_chuyen_de, hoi_nghi, tiep_khach, di_cong_tac, khac. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>nature</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nature"                data-endpoint="GETapi-schedules"
               value="architecto"
               data-component="query">
    <br>
<p>Lọc theo tính chất: thuong, quan_trong, mat. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>position</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="position"                data-endpoint="GETapi-schedules"
               value="architecto"
               data-component="query">
    <br>
<p>Lọc theo chức danh chủ trì. Example: <code>architecto</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>participant_user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="participant_user_id"                data-endpoint="GETapi-schedules"
               value="16"
               data-component="query">
    <br>
<p>Lọc theo thành phần tham dự. Example: <code>16</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_dir</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort_dir"                data-endpoint="GETapi-schedules"
               value="asc"
               data-component="query">
    <br>
<p>Thứ tự: asc, desc. Example: <code>asc</code></p>
            </div>
                </form>

                    <h2 id="schedule-lich-cong-tac-GETapi-schedules--schedule_id-">Chi tiết lịch công tác</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-schedules--schedule_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/schedules/1" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/schedules/1"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/schedules/1';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-schedules--schedule_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: null,
        &quot;event_date&quot;: &quot;29/03/2026&quot;,
        &quot;session&quot;: &quot;sang&quot;,
        &quot;start_time&quot;: &quot;03:25&quot;,
        &quot;content&quot;: &quot;Dolorem mollitia deleniti nemo.&quot;,
        &quot;location&quot;: &quot;2945 O&#039;Connell Mission Apt. 329\nEast Eltonhaven, TN 91558&quot;,
        &quot;prep_unit&quot;: null,
        &quot;driver_info&quot;: null,
        &quot;color_code&quot;: null,
        &quot;sort_order&quot;: 8,
        &quot;department_id&quot;: null,
        &quot;status&quot;: &quot;inactive&quot;,
        &quot;meeting_type&quot;: &quot;khac&quot;,
        &quot;meeting_type_label&quot;: &quot;Kh&aacute;c&quot;,
        &quot;nature&quot;: &quot;thuong&quot;,
        &quot;nature_label&quot;: &quot;Thường&quot;,
        &quot;created_by&quot;: &quot;N/A&quot;,
        &quot;updated_by&quot;: &quot;N/A&quot;,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    &quot;success&quot;: &quot;true&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-schedules--schedule_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-schedules--schedule_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-schedules--schedule_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-schedules--schedule_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-schedules--schedule_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-schedules--schedule_id-" data-method="GET"
      data-path="api/schedules/{schedule_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-schedules--schedule_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-schedules--schedule_id-"
                    onclick="tryItOut('GETapi-schedules--schedule_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-schedules--schedule_id-"
                    onclick="cancelTryOut('GETapi-schedules--schedule_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-schedules--schedule_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/schedules/{schedule_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-schedules--schedule_id-"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="GETapi-schedules--schedule_id-"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-schedules--schedule_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-schedules--schedule_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>schedule_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="schedule_id"                data-endpoint="GETapi-schedules--schedule_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the schedule. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>schedule</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="schedule"                data-endpoint="GETapi-schedules--schedule_id-"
               value="1"
               data-component="url">
    <br>
<p>ID lịch. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="schedule-lich-cong-tac-POSTapi-schedules">Tạo lịch công tác</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-schedules">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/schedules" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "content=Họp Ban Thường vụ"\
    --form "event_date=2026-04-01"\
    --form "session=sang"\
    --form "department_id=1"\
    --form "start_time=08:00"\
    --form "chairperson_id=1"\
    --form "location=Phòng họp A"\
    --form "prep_unit=Văn phòng"\
    --form "driver_info=Nguyễn Văn A"\
    --form "meeting_type=hop_thuong_ky"\
    --form "nature=thuong"\
    --form "color_code=#FF5733"\
    --form "status=active"\
    --form "participants[]=architecto"\
    --form "notification[channel]=app"\
    --form "notification[remind_at]=2026-03-25T03:43:49"\
    --form "notifications[]=architecto"\
    --form "attachments[]=@/tmp/php51o6ghdsnv5t0fF636z" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/schedules"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('content', 'Họp Ban Thường vụ');
body.append('event_date', '2026-04-01');
body.append('session', 'sang');
body.append('department_id', '1');
body.append('start_time', '08:00');
body.append('chairperson_id', '1');
body.append('location', 'Phòng họp A');
body.append('prep_unit', 'Văn phòng');
body.append('driver_info', 'Nguyễn Văn A');
body.append('meeting_type', 'hop_thuong_ky');
body.append('nature', 'thuong');
body.append('color_code', '#FF5733');
body.append('status', 'active');
body.append('participants[]', 'architecto');
body.append('notification[channel]', 'app');
body.append('notification[remind_at]', '2026-03-25T03:43:49');
body.append('notifications[]', 'architecto');
body.append('attachments[]', document.querySelector('input[name="attachments[]"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/schedules';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'multipart/form-data',
            'Accept' =&gt; 'application/json',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'content',
                'contents' =&gt; 'Họp Ban Thường vụ'
            ],
            [
                'name' =&gt; 'event_date',
                'contents' =&gt; '2026-04-01'
            ],
            [
                'name' =&gt; 'session',
                'contents' =&gt; 'sang'
            ],
            [
                'name' =&gt; 'department_id',
                'contents' =&gt; '1'
            ],
            [
                'name' =&gt; 'start_time',
                'contents' =&gt; '08:00'
            ],
            [
                'name' =&gt; 'chairperson_id',
                'contents' =&gt; '1'
            ],
            [
                'name' =&gt; 'location',
                'contents' =&gt; 'Phòng họp A'
            ],
            [
                'name' =&gt; 'prep_unit',
                'contents' =&gt; 'Văn phòng'
            ],
            [
                'name' =&gt; 'driver_info',
                'contents' =&gt; 'Nguyễn Văn A'
            ],
            [
                'name' =&gt; 'meeting_type',
                'contents' =&gt; 'hop_thuong_ky'
            ],
            [
                'name' =&gt; 'nature',
                'contents' =&gt; 'thuong'
            ],
            [
                'name' =&gt; 'color_code',
                'contents' =&gt; '#FF5733'
            ],
            [
                'name' =&gt; 'status',
                'contents' =&gt; 'active'
            ],
            [
                'name' =&gt; 'participants[]',
                'contents' =&gt; 'architecto'
            ],
            [
                'name' =&gt; 'notification[channel]',
                'contents' =&gt; 'app'
            ],
            [
                'name' =&gt; 'notification[remind_at]',
                'contents' =&gt; '2026-03-25T03:43:49'
            ],
            [
                'name' =&gt; 'notifications[]',
                'contents' =&gt; 'architecto'
            ],
            [
                'name' =&gt; 'attachments[]',
                'contents' =&gt; fopen('/tmp/php51o6ghdsnv5t0fF636z', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-schedules">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: null,
        &quot;event_date&quot;: &quot;05/04/2026&quot;,
        &quot;session&quot;: &quot;sang&quot;,
        &quot;start_time&quot;: &quot;11:11&quot;,
        &quot;content&quot;: &quot;Nostrum qui commodi incidunt iure.&quot;,
        &quot;location&quot;: null,
        &quot;prep_unit&quot;: &quot;Bauch, Fritsch and O&#039;Keefe&quot;,
        &quot;driver_info&quot;: null,
        &quot;color_code&quot;: null,
        &quot;sort_order&quot;: 84,
        &quot;department_id&quot;: null,
        &quot;status&quot;: &quot;inactive&quot;,
        &quot;meeting_type&quot;: &quot;hop_chuyen_de&quot;,
        &quot;meeting_type_label&quot;: &quot;Họp chuy&ecirc;n đề&quot;,
        &quot;nature&quot;: &quot;quan_trong&quot;,
        &quot;nature_label&quot;: &quot;Quan trọng&quot;,
        &quot;created_by&quot;: &quot;N/A&quot;,
        &quot;updated_by&quot;: &quot;N/A&quot;,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    &quot;success&quot;: &quot;true&quot;,
    &quot;message&quot;: &quot;Tạo lịch c&ocirc;ng t&aacute;c th&agrave;nh c&ocirc;ng!&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-schedules" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-schedules"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-schedules"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-schedules" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-schedules">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-schedules" data-method="POST"
      data-path="api/schedules"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-schedules', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-schedules"
                    onclick="tryItOut('POSTapi-schedules');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-schedules"
                    onclick="cancelTryOut('POSTapi-schedules');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-schedules"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/schedules</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-schedules"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="POSTapi-schedules"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-schedules"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-schedules"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>content</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="content"                data-endpoint="POSTapi-schedules"
               value="Họp Ban Thường vụ"
               data-component="body">
    <br>
<p>Nội dung lịch. Example: <code>Họp Ban Thường vụ</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>event_date</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="event_date"                data-endpoint="POSTapi-schedules"
               value="2026-04-01"
               data-component="body">
    <br>
<p>Ngày diễn ra (Y-m-d). Example: <code>2026-04-01</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>session</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="session"                data-endpoint="POSTapi-schedules"
               value="sang"
               data-component="body">
    <br>
<p>Buổi: sang, chieu, toi. Example: <code>sang</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>department_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="department_id"                data-endpoint="POSTapi-schedules"
               value="1"
               data-component="body">
    <br>
<p>ID đơn vị. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>start_time</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="start_time"                data-endpoint="POSTapi-schedules"
               value="08:00"
               data-component="body">
    <br>
<p>Giờ bắt đầu (HH:mm). Example: <code>08:00</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>chairperson_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="chairperson_id"                data-endpoint="POSTapi-schedules"
               value="1"
               data-component="body">
    <br>
<p>ID người chủ trì. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>location</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="location"                data-endpoint="POSTapi-schedules"
               value="Phòng họp A"
               data-component="body">
    <br>
<p>Địa điểm. Example: <code>Phòng họp A</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>prep_unit</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="prep_unit"                data-endpoint="POSTapi-schedules"
               value="Văn phòng"
               data-component="body">
    <br>
<p>Đơn vị chuẩn bị. Example: <code>Văn phòng</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>driver_info</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="driver_info"                data-endpoint="POSTapi-schedules"
               value="Nguyễn Văn A"
               data-component="body">
    <br>
<p>Thông tin lái xe. Example: <code>Nguyễn Văn A</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>meeting_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="meeting_type"                data-endpoint="POSTapi-schedules"
               value="hop_thuong_ky"
               data-component="body">
    <br>
<p>Loại cuộc họp: hop_thuong_ky, hop_dot_xuat, hop_chuyen_de, hoi_nghi, tiep_khach, di_cong_tac, khac. Example: <code>hop_thuong_ky</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nature</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nature"                data-endpoint="POSTapi-schedules"
               value="thuong"
               data-component="body">
    <br>
<p>Tính chất: thuong, quan_trong, mat. Example: <code>thuong</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>color_code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="color_code"                data-endpoint="POSTapi-schedules"
               value="#FF5733"
               data-component="body">
    <br>
<p>Mã màu. Example: <code>#FF5733</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="POSTapi-schedules"
               value="active"
               data-component="body">
    <br>
<p>Example: <code>active</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>active</code></li> <li><code>inactive</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>participants</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>
<p>Danh sách thành phần tham dự.</p>
            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="participants.0.user_id"                data-endpoint="POSTapi-schedules"
               value="16"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the users table. Example: <code>16</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>external_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="participants.0.external_name"                data-endpoint="POSTapi-schedules"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
                    </div>
                                                                <div style=" margin-left: 14px; clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>*</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="participants.*.user_id"                data-endpoint="POSTapi-schedules"
               value="16"
               data-component="body">
    <br>
<p>ID user tham dự. Example: <code>16</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>external_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="participants.*.external_name"                data-endpoint="POSTapi-schedules"
               value="architecto"
               data-component="body">
    <br>
<p>Tên thành phần bên ngoài. Example: <code>architecto</code></p>
                    </div>
                                    </details>
        </div>
                                        </details>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>notification</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>channel</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="notification.channel"                data-endpoint="POSTapi-schedules"
               value="app"
               data-component="body">
    <br>
<p>This field is required when <code>notification</code> is present. Example: <code>app</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>sms</code></li> <li><code>zalo</code></li> <li><code>website</code></li> <li><code>app</code></li></ul>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>remind_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="notification.remind_at"                data-endpoint="POSTapi-schedules"
               value="2026-03-25T03:43:49"
               data-component="body">
    <br>
<p>This field is required when <code>notification</code> is present. Must be a valid date. Example: <code>2026-03-25T03:43:49</code></p>
                    </div>
                                    </details>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>attachments</code></b>&nbsp;&nbsp;
<small>file[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="attachments[0]"                data-endpoint="POSTapi-schedules"
               data-component="body">
        <input type="file" style="display: none"
               name="attachments[1]"                data-endpoint="POSTapi-schedules"
               data-component="body">
    <br>
<p>Tập tin đính kèm (tối đa 20 file, mỗi file tối đa 10MB).</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>notifications</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>
<p>Danh sách thông báo nhắc lịch.</p>
            </summary>
                                                <div style=" margin-left: 14px; clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>*</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="notifications.*.user_id"                data-endpoint="POSTapi-schedules"
               value="16"
               data-component="body">
    <br>
<p>ID người nhận. Example: <code>16</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>channel</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="notifications.*.channel"                data-endpoint="POSTapi-schedules"
               value="architecto"
               data-component="body">
    <br>
<p>Kênh: sms, zalo, website, app. Example: <code>architecto</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>remind_at</code></b>&nbsp;&nbsp;
<small>datetime</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="notifications.*.remind_at"                data-endpoint="POSTapi-schedules"
               value="architecto"
               data-component="body">
    <br>
<p>Thời gian nhắc. Example: <code>architecto</code></p>
                    </div>
                                    </details>
        </div>
                                        </details>
        </div>
        </form>

                    <h2 id="schedule-lich-cong-tac-PUTapi-schedules--schedule_id-">Cập nhật lịch công tác</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-schedules--schedule_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/schedules/1" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "content=architecto"\
    --form "event_date=architecto"\
    --form "session=architecto"\
    --form "department_id=16"\
    --form "start_time=architecto"\
    --form "chairperson_id=16"\
    --form "location=architecto"\
    --form "prep_unit=architecto"\
    --form "driver_info=architecto"\
    --form "meeting_type=architecto"\
    --form "nature=architecto"\
    --form "color_code=architecto"\
    --form "status=active"\
    --form "participants[]=architecto"\
    --form "notification[channel]=sms"\
    --form "notification[remind_at]=2026-03-25T03:43:49"\
    --form "remove_attachment_ids[]=architecto"\
    --form "notifications[]=architecto"\
    --form "attachments[]=@/tmp/phpmjlcvimhmdue2S0BGlP" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/schedules/1"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('content', 'architecto');
body.append('event_date', 'architecto');
body.append('session', 'architecto');
body.append('department_id', '16');
body.append('start_time', 'architecto');
body.append('chairperson_id', '16');
body.append('location', 'architecto');
body.append('prep_unit', 'architecto');
body.append('driver_info', 'architecto');
body.append('meeting_type', 'architecto');
body.append('nature', 'architecto');
body.append('color_code', 'architecto');
body.append('status', 'active');
body.append('participants[]', 'architecto');
body.append('notification[channel]', 'sms');
body.append('notification[remind_at]', '2026-03-25T03:43:49');
body.append('remove_attachment_ids[]', 'architecto');
body.append('notifications[]', 'architecto');
body.append('attachments[]', document.querySelector('input[name="attachments[]"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/schedules/1';
$response = $client-&gt;put(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'multipart/form-data',
            'Accept' =&gt; 'application/json',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'content',
                'contents' =&gt; 'architecto'
            ],
            [
                'name' =&gt; 'event_date',
                'contents' =&gt; 'architecto'
            ],
            [
                'name' =&gt; 'session',
                'contents' =&gt; 'architecto'
            ],
            [
                'name' =&gt; 'department_id',
                'contents' =&gt; '16'
            ],
            [
                'name' =&gt; 'start_time',
                'contents' =&gt; 'architecto'
            ],
            [
                'name' =&gt; 'chairperson_id',
                'contents' =&gt; '16'
            ],
            [
                'name' =&gt; 'location',
                'contents' =&gt; 'architecto'
            ],
            [
                'name' =&gt; 'prep_unit',
                'contents' =&gt; 'architecto'
            ],
            [
                'name' =&gt; 'driver_info',
                'contents' =&gt; 'architecto'
            ],
            [
                'name' =&gt; 'meeting_type',
                'contents' =&gt; 'architecto'
            ],
            [
                'name' =&gt; 'nature',
                'contents' =&gt; 'architecto'
            ],
            [
                'name' =&gt; 'color_code',
                'contents' =&gt; 'architecto'
            ],
            [
                'name' =&gt; 'status',
                'contents' =&gt; 'active'
            ],
            [
                'name' =&gt; 'participants[]',
                'contents' =&gt; 'architecto'
            ],
            [
                'name' =&gt; 'notification[channel]',
                'contents' =&gt; 'sms'
            ],
            [
                'name' =&gt; 'notification[remind_at]',
                'contents' =&gt; '2026-03-25T03:43:49'
            ],
            [
                'name' =&gt; 'remove_attachment_ids[]',
                'contents' =&gt; 'architecto'
            ],
            [
                'name' =&gt; 'notifications[]',
                'contents' =&gt; 'architecto'
            ],
            [
                'name' =&gt; 'attachments[]',
                'contents' =&gt; fopen('/tmp/phpmjlcvimhmdue2S0BGlP', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-PUTapi-schedules--schedule_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: null,
        &quot;event_date&quot;: &quot;05/04/2026&quot;,
        &quot;session&quot;: &quot;sang&quot;,
        &quot;start_time&quot;: &quot;11:11&quot;,
        &quot;content&quot;: &quot;Nostrum qui commodi incidunt iure.&quot;,
        &quot;location&quot;: null,
        &quot;prep_unit&quot;: &quot;Bauch, Fritsch and O&#039;Keefe&quot;,
        &quot;driver_info&quot;: null,
        &quot;color_code&quot;: null,
        &quot;sort_order&quot;: 84,
        &quot;department_id&quot;: null,
        &quot;status&quot;: &quot;inactive&quot;,
        &quot;meeting_type&quot;: &quot;hop_chuyen_de&quot;,
        &quot;meeting_type_label&quot;: &quot;Họp chuy&ecirc;n đề&quot;,
        &quot;nature&quot;: &quot;quan_trong&quot;,
        &quot;nature_label&quot;: &quot;Quan trọng&quot;,
        &quot;created_by&quot;: &quot;N/A&quot;,
        &quot;updated_by&quot;: &quot;N/A&quot;,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    &quot;success&quot;: &quot;true&quot;,
    &quot;message&quot;: &quot;Cập nhật lịch c&ocirc;ng t&aacute;c th&agrave;nh c&ocirc;ng!&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-schedules--schedule_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-schedules--schedule_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-schedules--schedule_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-schedules--schedule_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-schedules--schedule_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-schedules--schedule_id-" data-method="PUT"
      data-path="api/schedules/{schedule_id}"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-schedules--schedule_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-schedules--schedule_id-"
                    onclick="tryItOut('PUTapi-schedules--schedule_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-schedules--schedule_id-"
                    onclick="cancelTryOut('PUTapi-schedules--schedule_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-schedules--schedule_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/schedules/{schedule_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-schedules--schedule_id-"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="PUTapi-schedules--schedule_id-"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-schedules--schedule_id-"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-schedules--schedule_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>schedule_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="schedule_id"                data-endpoint="PUTapi-schedules--schedule_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the schedule. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>schedule</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="schedule"                data-endpoint="PUTapi-schedules--schedule_id-"
               value="1"
               data-component="url">
    <br>
<p>ID lịch. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>content</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="content"                data-endpoint="PUTapi-schedules--schedule_id-"
               value="architecto"
               data-component="body">
    <br>
<p>Nội dung lịch. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>event_date</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="event_date"                data-endpoint="PUTapi-schedules--schedule_id-"
               value="architecto"
               data-component="body">
    <br>
<p>Ngày diễn ra (Y-m-d). Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>session</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="session"                data-endpoint="PUTapi-schedules--schedule_id-"
               value="architecto"
               data-component="body">
    <br>
<p>Buổi: sang, chieu, toi. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>department_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="department_id"                data-endpoint="PUTapi-schedules--schedule_id-"
               value="16"
               data-component="body">
    <br>
<p>ID đơn vị. Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>start_time</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="start_time"                data-endpoint="PUTapi-schedules--schedule_id-"
               value="architecto"
               data-component="body">
    <br>
<p>Giờ bắt đầu (HH:mm). Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>chairperson_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="chairperson_id"                data-endpoint="PUTapi-schedules--schedule_id-"
               value="16"
               data-component="body">
    <br>
<p>ID người chủ trì. Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>location</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="location"                data-endpoint="PUTapi-schedules--schedule_id-"
               value="architecto"
               data-component="body">
    <br>
<p>Địa điểm. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>prep_unit</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="prep_unit"                data-endpoint="PUTapi-schedules--schedule_id-"
               value="architecto"
               data-component="body">
    <br>
<p>Đơn vị chuẩn bị. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>driver_info</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="driver_info"                data-endpoint="PUTapi-schedules--schedule_id-"
               value="architecto"
               data-component="body">
    <br>
<p>Thông tin lái xe. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>meeting_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="meeting_type"                data-endpoint="PUTapi-schedules--schedule_id-"
               value="architecto"
               data-component="body">
    <br>
<p>Loại cuộc họp: hop_thuong_ky, hop_dot_xuat, hop_chuyen_de, hoi_nghi, tiep_khach, di_cong_tac, khac. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nature</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nature"                data-endpoint="PUTapi-schedules--schedule_id-"
               value="architecto"
               data-component="body">
    <br>
<p>Tính chất: thuong, quan_trong, mat. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>color_code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="color_code"                data-endpoint="PUTapi-schedules--schedule_id-"
               value="architecto"
               data-component="body">
    <br>
<p>Mã màu. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PUTapi-schedules--schedule_id-"
               value="active"
               data-component="body">
    <br>
<p>Example: <code>active</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>active</code></li> <li><code>inactive</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>participants</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>
<p>Danh sách thành phần tham dự (ghi đè toàn bộ).</p>
            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="participants.0.user_id"                data-endpoint="PUTapi-schedules--schedule_id-"
               value="16"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the users table. Example: <code>16</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>external_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="participants.0.external_name"                data-endpoint="PUTapi-schedules--schedule_id-"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
                    </div>
                                    </details>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>notification</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>channel</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="notification.channel"                data-endpoint="PUTapi-schedules--schedule_id-"
               value="sms"
               data-component="body">
    <br>
<p>This field is required when <code>notification</code> is present. Example: <code>sms</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>sms</code></li> <li><code>zalo</code></li> <li><code>website</code></li> <li><code>app</code></li></ul>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>remind_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="notification.remind_at"                data-endpoint="PUTapi-schedules--schedule_id-"
               value="2026-03-25T03:43:49"
               data-component="body">
    <br>
<p>This field is required when <code>notification</code> is present. Must be a valid date. Example: <code>2026-03-25T03:43:49</code></p>
                    </div>
                                    </details>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>remove_attachment_ids</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="remove_attachment_ids[0]"                data-endpoint="PUTapi-schedules--schedule_id-"
               data-component="body">
        <input type="text" style="display: none"
               name="remove_attachment_ids[1]"                data-endpoint="PUTapi-schedules--schedule_id-"
               data-component="body">
    <br>
<p>Danh sách ID file cần xóa.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>attachments</code></b>&nbsp;&nbsp;
<small>file[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="attachments[0]"                data-endpoint="PUTapi-schedules--schedule_id-"
               data-component="body">
        <input type="file" style="display: none"
               name="attachments[1]"                data-endpoint="PUTapi-schedules--schedule_id-"
               data-component="body">
    <br>
<p>Tập tin đính kèm mới.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>notifications</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="notifications[0]"                data-endpoint="PUTapi-schedules--schedule_id-"
               data-component="body">
        <input type="text" style="display: none"
               name="notifications[1]"                data-endpoint="PUTapi-schedules--schedule_id-"
               data-component="body">
    <br>
<p>Danh sách thông báo (ghi đè toàn bộ).</p>
        </div>
        </form>

                    <h2 id="schedule-lich-cong-tac-PATCHapi-schedules--schedule_id-">Cập nhật lịch công tác</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PATCHapi-schedules--schedule_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost:8000/api/schedules/1" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "content=architecto"\
    --form "event_date=architecto"\
    --form "session=architecto"\
    --form "department_id=16"\
    --form "start_time=architecto"\
    --form "chairperson_id=16"\
    --form "location=architecto"\
    --form "prep_unit=architecto"\
    --form "driver_info=architecto"\
    --form "meeting_type=architecto"\
    --form "nature=architecto"\
    --form "color_code=architecto"\
    --form "status=inactive"\
    --form "participants[]=architecto"\
    --form "notification[channel]=app"\
    --form "notification[remind_at]=2026-03-25T03:43:49"\
    --form "remove_attachment_ids[]=architecto"\
    --form "notifications[]=architecto"\
    --form "attachments[]=@/tmp/phptgoi48p96btp3RUH0VE" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/schedules/1"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('content', 'architecto');
body.append('event_date', 'architecto');
body.append('session', 'architecto');
body.append('department_id', '16');
body.append('start_time', 'architecto');
body.append('chairperson_id', '16');
body.append('location', 'architecto');
body.append('prep_unit', 'architecto');
body.append('driver_info', 'architecto');
body.append('meeting_type', 'architecto');
body.append('nature', 'architecto');
body.append('color_code', 'architecto');
body.append('status', 'inactive');
body.append('participants[]', 'architecto');
body.append('notification[channel]', 'app');
body.append('notification[remind_at]', '2026-03-25T03:43:49');
body.append('remove_attachment_ids[]', 'architecto');
body.append('notifications[]', 'architecto');
body.append('attachments[]', document.querySelector('input[name="attachments[]"]').files[0]);

fetch(url, {
    method: "PATCH",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/schedules/1';
$response = $client-&gt;patch(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'multipart/form-data',
            'Accept' =&gt; 'application/json',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'content',
                'contents' =&gt; 'architecto'
            ],
            [
                'name' =&gt; 'event_date',
                'contents' =&gt; 'architecto'
            ],
            [
                'name' =&gt; 'session',
                'contents' =&gt; 'architecto'
            ],
            [
                'name' =&gt; 'department_id',
                'contents' =&gt; '16'
            ],
            [
                'name' =&gt; 'start_time',
                'contents' =&gt; 'architecto'
            ],
            [
                'name' =&gt; 'chairperson_id',
                'contents' =&gt; '16'
            ],
            [
                'name' =&gt; 'location',
                'contents' =&gt; 'architecto'
            ],
            [
                'name' =&gt; 'prep_unit',
                'contents' =&gt; 'architecto'
            ],
            [
                'name' =&gt; 'driver_info',
                'contents' =&gt; 'architecto'
            ],
            [
                'name' =&gt; 'meeting_type',
                'contents' =&gt; 'architecto'
            ],
            [
                'name' =&gt; 'nature',
                'contents' =&gt; 'architecto'
            ],
            [
                'name' =&gt; 'color_code',
                'contents' =&gt; 'architecto'
            ],
            [
                'name' =&gt; 'status',
                'contents' =&gt; 'inactive'
            ],
            [
                'name' =&gt; 'participants[]',
                'contents' =&gt; 'architecto'
            ],
            [
                'name' =&gt; 'notification[channel]',
                'contents' =&gt; 'app'
            ],
            [
                'name' =&gt; 'notification[remind_at]',
                'contents' =&gt; '2026-03-25T03:43:49'
            ],
            [
                'name' =&gt; 'remove_attachment_ids[]',
                'contents' =&gt; 'architecto'
            ],
            [
                'name' =&gt; 'notifications[]',
                'contents' =&gt; 'architecto'
            ],
            [
                'name' =&gt; 'attachments[]',
                'contents' =&gt; fopen('/tmp/phptgoi48p96btp3RUH0VE', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-PATCHapi-schedules--schedule_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: null,
        &quot;event_date&quot;: &quot;05/04/2026&quot;,
        &quot;session&quot;: &quot;sang&quot;,
        &quot;start_time&quot;: &quot;11:11&quot;,
        &quot;content&quot;: &quot;Nostrum qui commodi incidunt iure.&quot;,
        &quot;location&quot;: null,
        &quot;prep_unit&quot;: &quot;Bauch, Fritsch and O&#039;Keefe&quot;,
        &quot;driver_info&quot;: null,
        &quot;color_code&quot;: null,
        &quot;sort_order&quot;: 84,
        &quot;department_id&quot;: null,
        &quot;status&quot;: &quot;inactive&quot;,
        &quot;meeting_type&quot;: &quot;hop_chuyen_de&quot;,
        &quot;meeting_type_label&quot;: &quot;Họp chuy&ecirc;n đề&quot;,
        &quot;nature&quot;: &quot;quan_trong&quot;,
        &quot;nature_label&quot;: &quot;Quan trọng&quot;,
        &quot;created_by&quot;: &quot;N/A&quot;,
        &quot;updated_by&quot;: &quot;N/A&quot;,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    &quot;success&quot;: &quot;true&quot;,
    &quot;message&quot;: &quot;Cập nhật lịch c&ocirc;ng t&aacute;c th&agrave;nh c&ocirc;ng!&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PATCHapi-schedules--schedule_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-schedules--schedule_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-schedules--schedule_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHapi-schedules--schedule_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-schedules--schedule_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHapi-schedules--schedule_id-" data-method="PATCH"
      data-path="api/schedules/{schedule_id}"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-schedules--schedule_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-schedules--schedule_id-"
                    onclick="tryItOut('PATCHapi-schedules--schedule_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-schedules--schedule_id-"
                    onclick="cancelTryOut('PATCHapi-schedules--schedule_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-schedules--schedule_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/schedules/{schedule_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PATCHapi-schedules--schedule_id-"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="PATCHapi-schedules--schedule_id-"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHapi-schedules--schedule_id-"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHapi-schedules--schedule_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>schedule_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="schedule_id"                data-endpoint="PATCHapi-schedules--schedule_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the schedule. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>schedule</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="schedule"                data-endpoint="PATCHapi-schedules--schedule_id-"
               value="1"
               data-component="url">
    <br>
<p>ID lịch. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>content</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="content"                data-endpoint="PATCHapi-schedules--schedule_id-"
               value="architecto"
               data-component="body">
    <br>
<p>Nội dung lịch. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>event_date</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="event_date"                data-endpoint="PATCHapi-schedules--schedule_id-"
               value="architecto"
               data-component="body">
    <br>
<p>Ngày diễn ra (Y-m-d). Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>session</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="session"                data-endpoint="PATCHapi-schedules--schedule_id-"
               value="architecto"
               data-component="body">
    <br>
<p>Buổi: sang, chieu, toi. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>department_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="department_id"                data-endpoint="PATCHapi-schedules--schedule_id-"
               value="16"
               data-component="body">
    <br>
<p>ID đơn vị. Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>start_time</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="start_time"                data-endpoint="PATCHapi-schedules--schedule_id-"
               value="architecto"
               data-component="body">
    <br>
<p>Giờ bắt đầu (HH:mm). Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>chairperson_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="chairperson_id"                data-endpoint="PATCHapi-schedules--schedule_id-"
               value="16"
               data-component="body">
    <br>
<p>ID người chủ trì. Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>location</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="location"                data-endpoint="PATCHapi-schedules--schedule_id-"
               value="architecto"
               data-component="body">
    <br>
<p>Địa điểm. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>prep_unit</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="prep_unit"                data-endpoint="PATCHapi-schedules--schedule_id-"
               value="architecto"
               data-component="body">
    <br>
<p>Đơn vị chuẩn bị. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>driver_info</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="driver_info"                data-endpoint="PATCHapi-schedules--schedule_id-"
               value="architecto"
               data-component="body">
    <br>
<p>Thông tin lái xe. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>meeting_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="meeting_type"                data-endpoint="PATCHapi-schedules--schedule_id-"
               value="architecto"
               data-component="body">
    <br>
<p>Loại cuộc họp: hop_thuong_ky, hop_dot_xuat, hop_chuyen_de, hoi_nghi, tiep_khach, di_cong_tac, khac. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nature</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nature"                data-endpoint="PATCHapi-schedules--schedule_id-"
               value="architecto"
               data-component="body">
    <br>
<p>Tính chất: thuong, quan_trong, mat. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>color_code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="color_code"                data-endpoint="PATCHapi-schedules--schedule_id-"
               value="architecto"
               data-component="body">
    <br>
<p>Mã màu. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PATCHapi-schedules--schedule_id-"
               value="inactive"
               data-component="body">
    <br>
<p>Example: <code>inactive</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>active</code></li> <li><code>inactive</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>participants</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>
<p>Danh sách thành phần tham dự (ghi đè toàn bộ).</p>
            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="participants.0.user_id"                data-endpoint="PATCHapi-schedules--schedule_id-"
               value="16"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the users table. Example: <code>16</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>external_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="participants.0.external_name"                data-endpoint="PATCHapi-schedules--schedule_id-"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
                    </div>
                                    </details>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>notification</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>channel</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="notification.channel"                data-endpoint="PATCHapi-schedules--schedule_id-"
               value="app"
               data-component="body">
    <br>
<p>This field is required when <code>notification</code> is present. Example: <code>app</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>sms</code></li> <li><code>zalo</code></li> <li><code>website</code></li> <li><code>app</code></li></ul>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>remind_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="notification.remind_at"                data-endpoint="PATCHapi-schedules--schedule_id-"
               value="2026-03-25T03:43:49"
               data-component="body">
    <br>
<p>This field is required when <code>notification</code> is present. Must be a valid date. Example: <code>2026-03-25T03:43:49</code></p>
                    </div>
                                    </details>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>remove_attachment_ids</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="remove_attachment_ids[0]"                data-endpoint="PATCHapi-schedules--schedule_id-"
               data-component="body">
        <input type="text" style="display: none"
               name="remove_attachment_ids[1]"                data-endpoint="PATCHapi-schedules--schedule_id-"
               data-component="body">
    <br>
<p>Danh sách ID file cần xóa.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>attachments</code></b>&nbsp;&nbsp;
<small>file[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="attachments[0]"                data-endpoint="PATCHapi-schedules--schedule_id-"
               data-component="body">
        <input type="file" style="display: none"
               name="attachments[1]"                data-endpoint="PATCHapi-schedules--schedule_id-"
               data-component="body">
    <br>
<p>Tập tin đính kèm mới.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>notifications</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="notifications[0]"                data-endpoint="PATCHapi-schedules--schedule_id-"
               data-component="body">
        <input type="text" style="display: none"
               name="notifications[1]"                data-endpoint="PATCHapi-schedules--schedule_id-"
               data-component="body">
    <br>
<p>Danh sách thông báo (ghi đè toàn bộ).</p>
        </div>
        </form>

                    <h2 id="schedule-lich-cong-tac-DELETEapi-schedules--schedule_id-">Xóa lịch công tác</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-schedules--schedule_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/schedules/1" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/schedules/1"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/schedules/1';
$response = $client-&gt;delete(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-DELETEapi-schedules--schedule_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;X&oacute;a lịch c&ocirc;ng t&aacute;c th&agrave;nh c&ocirc;ng!&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-schedules--schedule_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-schedules--schedule_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-schedules--schedule_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-schedules--schedule_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-schedules--schedule_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-schedules--schedule_id-" data-method="DELETE"
      data-path="api/schedules/{schedule_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-schedules--schedule_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-schedules--schedule_id-"
                    onclick="tryItOut('DELETEapi-schedules--schedule_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-schedules--schedule_id-"
                    onclick="cancelTryOut('DELETEapi-schedules--schedule_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-schedules--schedule_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/schedules/{schedule_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-schedules--schedule_id-"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="DELETEapi-schedules--schedule_id-"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-schedules--schedule_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-schedules--schedule_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>schedule_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="schedule_id"                data-endpoint="DELETEapi-schedules--schedule_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the schedule. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>schedule</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="schedule"                data-endpoint="DELETEapi-schedules--schedule_id-"
               value="1"
               data-component="url">
    <br>
<p>ID lịch. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="schedule-lich-cong-tac-PATCHapi-schedules--schedule_id--status">Đổi trạng thái lịch công tác</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PATCHapi-schedules--schedule_id--status">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost:8000/api/schedules/1/status" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"status\": \"active\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/schedules/1/status"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "status": "active"
};

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/schedules/1/status';
$response = $client-&gt;patch(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'status' =&gt; 'active',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-PATCHapi-schedules--schedule_id--status">
</span>
<span id="execution-results-PATCHapi-schedules--schedule_id--status" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-schedules--schedule_id--status"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-schedules--schedule_id--status"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHapi-schedules--schedule_id--status" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-schedules--schedule_id--status">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHapi-schedules--schedule_id--status" data-method="PATCH"
      data-path="api/schedules/{schedule_id}/status"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-schedules--schedule_id--status', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-schedules--schedule_id--status"
                    onclick="tryItOut('PATCHapi-schedules--schedule_id--status');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-schedules--schedule_id--status"
                    onclick="cancelTryOut('PATCHapi-schedules--schedule_id--status');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-schedules--schedule_id--status"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/schedules/{schedule_id}/status</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PATCHapi-schedules--schedule_id--status"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="PATCHapi-schedules--schedule_id--status"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHapi-schedules--schedule_id--status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHapi-schedules--schedule_id--status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>schedule_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="schedule_id"                data-endpoint="PATCHapi-schedules--schedule_id--status"
               value="1"
               data-component="url">
    <br>
<p>The ID of the schedule. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>schedule</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="schedule"                data-endpoint="PATCHapi-schedules--schedule_id--status"
               value="1"
               data-component="url">
    <br>
<p>ID lịch. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PATCHapi-schedules--schedule_id--status"
               value="active"
               data-component="body">
    <br>
<p>Trạng thái mới: active, inactive. Example: <code>active</code></p>
        </div>
        </form>

                    <h2 id="schedule-lich-cong-tac-PATCHapi-schedules--schedule_id--move-up">Di chuyển lịch lên trên</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Swap vị trí với lịch liền trước cùng ngày và khối.</p>

<span id="example-requests-PATCHapi-schedules--schedule_id--move-up">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost:8000/api/schedules/1/move-up" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/schedules/1/move-up"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PATCH",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/schedules/1/move-up';
$response = $client-&gt;patch(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-PATCHapi-schedules--schedule_id--move-up">
</span>
<span id="execution-results-PATCHapi-schedules--schedule_id--move-up" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-schedules--schedule_id--move-up"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-schedules--schedule_id--move-up"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHapi-schedules--schedule_id--move-up" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-schedules--schedule_id--move-up">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHapi-schedules--schedule_id--move-up" data-method="PATCH"
      data-path="api/schedules/{schedule_id}/move-up"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-schedules--schedule_id--move-up', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-schedules--schedule_id--move-up"
                    onclick="tryItOut('PATCHapi-schedules--schedule_id--move-up');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-schedules--schedule_id--move-up"
                    onclick="cancelTryOut('PATCHapi-schedules--schedule_id--move-up');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-schedules--schedule_id--move-up"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/schedules/{schedule_id}/move-up</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PATCHapi-schedules--schedule_id--move-up"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="PATCHapi-schedules--schedule_id--move-up"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHapi-schedules--schedule_id--move-up"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHapi-schedules--schedule_id--move-up"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>schedule_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="schedule_id"                data-endpoint="PATCHapi-schedules--schedule_id--move-up"
               value="1"
               data-component="url">
    <br>
<p>The ID of the schedule. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>schedule</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="schedule"                data-endpoint="PATCHapi-schedules--schedule_id--move-up"
               value="1"
               data-component="url">
    <br>
<p>ID lịch. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="schedule-lich-cong-tac-PATCHapi-schedules--schedule_id--move-down">Di chuyển lịch xuống dưới</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Swap vị trí với lịch liền sau cùng ngày và khối.</p>

<span id="example-requests-PATCHapi-schedules--schedule_id--move-down">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost:8000/api/schedules/1/move-down" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/schedules/1/move-down"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PATCH",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/schedules/1/move-down';
$response = $client-&gt;patch(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-PATCHapi-schedules--schedule_id--move-down">
</span>
<span id="execution-results-PATCHapi-schedules--schedule_id--move-down" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-schedules--schedule_id--move-down"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-schedules--schedule_id--move-down"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHapi-schedules--schedule_id--move-down" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-schedules--schedule_id--move-down">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHapi-schedules--schedule_id--move-down" data-method="PATCH"
      data-path="api/schedules/{schedule_id}/move-down"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-schedules--schedule_id--move-down', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-schedules--schedule_id--move-down"
                    onclick="tryItOut('PATCHapi-schedules--schedule_id--move-down');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-schedules--schedule_id--move-down"
                    onclick="cancelTryOut('PATCHapi-schedules--schedule_id--move-down');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-schedules--schedule_id--move-down"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/schedules/{schedule_id}/move-down</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PATCHapi-schedules--schedule_id--move-down"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="PATCHapi-schedules--schedule_id--move-down"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHapi-schedules--schedule_id--move-down"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHapi-schedules--schedule_id--move-down"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>schedule_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="schedule_id"                data-endpoint="PATCHapi-schedules--schedule_id--move-down"
               value="1"
               data-component="url">
    <br>
<p>The ID of the schedule. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>schedule</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="schedule"                data-endpoint="PATCHapi-schedules--schedule_id--move-down"
               value="1"
               data-component="url">
    <br>
<p>ID lịch. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="schedule-lich-cong-tac-PATCHapi-schedules--schedule_id--insert-above">Chèn lịch phía trên bản ghi đích</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PATCHapi-schedules--schedule_id--insert-above">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost:8000/api/schedules/1/insert-above" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"target_id\": 5
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/schedules/1/insert-above"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "target_id": 5
};

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/schedules/1/insert-above';
$response = $client-&gt;patch(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'target_id' =&gt; 5,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-PATCHapi-schedules--schedule_id--insert-above">
</span>
<span id="execution-results-PATCHapi-schedules--schedule_id--insert-above" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-schedules--schedule_id--insert-above"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-schedules--schedule_id--insert-above"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHapi-schedules--schedule_id--insert-above" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-schedules--schedule_id--insert-above">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHapi-schedules--schedule_id--insert-above" data-method="PATCH"
      data-path="api/schedules/{schedule_id}/insert-above"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-schedules--schedule_id--insert-above', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-schedules--schedule_id--insert-above"
                    onclick="tryItOut('PATCHapi-schedules--schedule_id--insert-above');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-schedules--schedule_id--insert-above"
                    onclick="cancelTryOut('PATCHapi-schedules--schedule_id--insert-above');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-schedules--schedule_id--insert-above"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/schedules/{schedule_id}/insert-above</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PATCHapi-schedules--schedule_id--insert-above"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="PATCHapi-schedules--schedule_id--insert-above"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHapi-schedules--schedule_id--insert-above"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHapi-schedules--schedule_id--insert-above"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>schedule_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="schedule_id"                data-endpoint="PATCHapi-schedules--schedule_id--insert-above"
               value="1"
               data-component="url">
    <br>
<p>The ID of the schedule. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>schedule</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="schedule"                data-endpoint="PATCHapi-schedules--schedule_id--insert-above"
               value="1"
               data-component="url">
    <br>
<p>ID lịch cần di chuyển. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>target_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="target_id"                data-endpoint="PATCHapi-schedules--schedule_id--insert-above"
               value="5"
               data-component="body">
    <br>
<p>ID lịch đích. Example: <code>5</code></p>
        </div>
        </form>

                    <h2 id="schedule-lich-cong-tac-PATCHapi-schedules--schedule_id--insert-below">Chèn lịch phía dưới bản ghi đích</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PATCHapi-schedules--schedule_id--insert-below">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost:8000/api/schedules/1/insert-below" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"target_id\": 5
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/schedules/1/insert-below"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "target_id": 5
};

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/schedules/1/insert-below';
$response = $client-&gt;patch(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'target_id' =&gt; 5,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-PATCHapi-schedules--schedule_id--insert-below">
</span>
<span id="execution-results-PATCHapi-schedules--schedule_id--insert-below" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-schedules--schedule_id--insert-below"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-schedules--schedule_id--insert-below"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHapi-schedules--schedule_id--insert-below" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-schedules--schedule_id--insert-below">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHapi-schedules--schedule_id--insert-below" data-method="PATCH"
      data-path="api/schedules/{schedule_id}/insert-below"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-schedules--schedule_id--insert-below', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-schedules--schedule_id--insert-below"
                    onclick="tryItOut('PATCHapi-schedules--schedule_id--insert-below');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-schedules--schedule_id--insert-below"
                    onclick="cancelTryOut('PATCHapi-schedules--schedule_id--insert-below');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-schedules--schedule_id--insert-below"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/schedules/{schedule_id}/insert-below</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PATCHapi-schedules--schedule_id--insert-below"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="PATCHapi-schedules--schedule_id--insert-below"
               value="ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc (bắt buộc với endpoint yêu cầu auth). Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHapi-schedules--schedule_id--insert-below"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHapi-schedules--schedule_id--insert-below"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>schedule_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="schedule_id"                data-endpoint="PATCHapi-schedules--schedule_id--insert-below"
               value="1"
               data-component="url">
    <br>
<p>The ID of the schedule. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>schedule</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="schedule"                data-endpoint="PATCHapi-schedules--schedule_id--insert-below"
               value="1"
               data-component="url">
    <br>
<p>ID lịch cần di chuyển. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>target_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="target_id"                data-endpoint="PATCHapi-schedules--schedule_id--insert-below"
               value="5"
               data-component="body">
    <br>
<p>ID lịch đích. Example: <code>5</code></p>
        </div>
        </form>

                <h1 id="schedule-thong-bao">Schedule - Thông báo</h1>

    

                                <h2 id="schedule-thong-bao-GETapi-schedule-notifications-unread-count">Số thông báo chưa đọc (badge)</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Trả về số lượng thông báo chưa đọc của user hiện tại để hiển thị badge.</p>

<span id="example-requests-GETapi-schedule-notifications-unread-count">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/schedule-notifications/unread-count" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc. Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/schedule-notifications/unread-count"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc. Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/schedule-notifications/unread-count';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc. Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-schedule-notifications-unread-count">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;unread_count&quot;: 5
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-schedule-notifications-unread-count" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-schedule-notifications-unread-count"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-schedule-notifications-unread-count"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-schedule-notifications-unread-count" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-schedule-notifications-unread-count">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-schedule-notifications-unread-count" data-method="GET"
      data-path="api/schedule-notifications/unread-count"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-schedule-notifications-unread-count', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-schedule-notifications-unread-count"
                    onclick="tryItOut('GETapi-schedule-notifications-unread-count');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-schedule-notifications-unread-count"
                    onclick="cancelTryOut('GETapi-schedule-notifications-unread-count');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-schedule-notifications-unread-count"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/schedule-notifications/unread-count</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-schedule-notifications-unread-count"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="GETapi-schedule-notifications-unread-count"
               value="ID đơn vị cần làm việc. Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc. Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-schedule-notifications-unread-count"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-schedule-notifications-unread-count"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="schedule-thong-bao-GETapi-schedule-notifications">Danh sách thông báo</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Danh sách thông báo của user hiện tại, mới nhất trước.</p>

<span id="example-requests-GETapi-schedule-notifications">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/schedule-notifications?limit=20" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc. Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/schedule-notifications"
);

const params = {
    "limit": "20",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc. Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/schedule-notifications';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc. Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'limit' =&gt; '20',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-schedule-notifications">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;schedule_id&quot;: 1,
            &quot;channel&quot;: &quot;website&quot;,
            &quot;status&quot;: &quot;pending&quot;,
            &quot;remind_at&quot;: &quot;12:00:00 15/03/2026&quot;,
            &quot;sent_at&quot;: null,
            &quot;read_at&quot;: null,
            &quot;is_read&quot;: false,
            &quot;created_at&quot;: &quot;02:14:46 25/03/2026&quot;
        },
        {
            &quot;id&quot;: 1,
            &quot;schedule_id&quot;: 1,
            &quot;channel&quot;: &quot;website&quot;,
            &quot;status&quot;: &quot;pending&quot;,
            &quot;remind_at&quot;: &quot;12:00:00 15/03/2026&quot;,
            &quot;sent_at&quot;: null,
            &quot;read_at&quot;: null,
            &quot;is_read&quot;: false,
            &quot;created_at&quot;: &quot;02:14:46 25/03/2026&quot;
        }
    ],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;/?page=1&quot;,
        &quot;last&quot;: &quot;/?page=1&quot;,
        &quot;prev&quot;: null,
        &quot;next&quot;: null
    },
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 1,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;/?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;page&quot;: 1,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;/&quot;,
        &quot;per_page&quot;: 20,
        &quot;to&quot;: 2,
        &quot;total&quot;: 2
    },
    &quot;success&quot;: &quot;true&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-schedule-notifications" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-schedule-notifications"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-schedule-notifications"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-schedule-notifications" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-schedule-notifications">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-schedule-notifications" data-method="GET"
      data-path="api/schedule-notifications"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-schedule-notifications', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-schedule-notifications"
                    onclick="tryItOut('GETapi-schedule-notifications');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-schedule-notifications"
                    onclick="cancelTryOut('GETapi-schedule-notifications');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-schedule-notifications"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/schedule-notifications</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-schedule-notifications"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="GETapi-schedule-notifications"
               value="ID đơn vị cần làm việc. Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc. Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-schedule-notifications"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-schedule-notifications"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETapi-schedule-notifications"
               value="20"
               data-component="query">
    <br>
<p>Số bản ghi mỗi trang (1-100). Example: <code>20</code></p>
            </div>
                </form>

                    <h2 id="schedule-thong-bao-PATCHapi-schedule-notifications--scheduleNotification_id--read">Đánh dấu đã đọc</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PATCHapi-schedule-notifications--scheduleNotification_id--read">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost:8000/api/schedule-notifications/1/read" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc. Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/schedule-notifications/1/read"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc. Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PATCH",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/schedule-notifications/1/read';
$response = $client-&gt;patch(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc. Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-PATCHapi-schedule-notifications--scheduleNotification_id--read">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Đ&atilde; đ&aacute;nh dấu đ&atilde; đọc.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PATCHapi-schedule-notifications--scheduleNotification_id--read" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-schedule-notifications--scheduleNotification_id--read"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-schedule-notifications--scheduleNotification_id--read"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHapi-schedule-notifications--scheduleNotification_id--read" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-schedule-notifications--scheduleNotification_id--read">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHapi-schedule-notifications--scheduleNotification_id--read" data-method="PATCH"
      data-path="api/schedule-notifications/{scheduleNotification_id}/read"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-schedule-notifications--scheduleNotification_id--read', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-schedule-notifications--scheduleNotification_id--read"
                    onclick="tryItOut('PATCHapi-schedule-notifications--scheduleNotification_id--read');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-schedule-notifications--scheduleNotification_id--read"
                    onclick="cancelTryOut('PATCHapi-schedule-notifications--scheduleNotification_id--read');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-schedule-notifications--scheduleNotification_id--read"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/schedule-notifications/{scheduleNotification_id}/read</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PATCHapi-schedule-notifications--scheduleNotification_id--read"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="PATCHapi-schedule-notifications--scheduleNotification_id--read"
               value="ID đơn vị cần làm việc. Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc. Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHapi-schedule-notifications--scheduleNotification_id--read"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHapi-schedule-notifications--scheduleNotification_id--read"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>scheduleNotification_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="scheduleNotification_id"                data-endpoint="PATCHapi-schedule-notifications--scheduleNotification_id--read"
               value="1"
               data-component="url">
    <br>
<p>The ID of the scheduleNotification. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>scheduleNotification</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="scheduleNotification"                data-endpoint="PATCHapi-schedule-notifications--scheduleNotification_id--read"
               value="1"
               data-component="url">
    <br>
<p>ID thông báo. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="schedule-thong-bao-PATCHapi-schedule-notifications-read-all">Đánh dấu tất cả đã đọc</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Đánh dấu tất cả thông báo chưa đọc của user hiện tại là đã đọc.</p>

<span id="example-requests-PATCHapi-schedule-notifications-read-all">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost:8000/api/schedule-notifications/read-all" \
    --header "Authorization: Bearer Bearer {YOUR_ACCESS_TOKEN}" \
    --header "X-Department-Id: ID đơn vị cần làm việc. Example: 1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/schedule-notifications/read-all"
);

const headers = {
    "Authorization": "Bearer Bearer {YOUR_ACCESS_TOKEN}",
    "X-Department-Id": "ID đơn vị cần làm việc. Example: 1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PATCH",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/schedule-notifications/read-all';
$response = $client-&gt;patch(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Bearer {YOUR_ACCESS_TOKEN}',
            'X-Department-Id' =&gt; 'ID đơn vị cần làm việc. Example: 1',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-PATCHapi-schedule-notifications-read-all">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Đ&atilde; đ&aacute;nh dấu tất cả đ&atilde; đọc.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PATCHapi-schedule-notifications-read-all" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-schedule-notifications-read-all"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-schedule-notifications-read-all"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHapi-schedule-notifications-read-all" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-schedule-notifications-read-all">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHapi-schedule-notifications-read-all" data-method="PATCH"
      data-path="api/schedule-notifications/read-all"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-schedule-notifications-read-all', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-schedule-notifications-read-all"
                    onclick="tryItOut('PATCHapi-schedule-notifications-read-all');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-schedule-notifications-read-all"
                    onclick="cancelTryOut('PATCHapi-schedule-notifications-read-all');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-schedule-notifications-read-all"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/schedule-notifications/read-all</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PATCHapi-schedule-notifications-read-all"
               value="Bearer Bearer {YOUR_ACCESS_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer Bearer {YOUR_ACCESS_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Department-Id</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Department-Id"                data-endpoint="PATCHapi-schedule-notifications-read-all"
               value="ID đơn vị cần làm việc. Example: 1"
               data-component="header">
    <br>
<p>Example: <code>ID đơn vị cần làm việc. Example: 1</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHapi-schedule-notifications-read-all"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHapi-schedule-notifications-read-all"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                                                        <button type="button" class="lang-button" data-language-name="php">php</button>
                            </div>
            </div>
</div>
</body>
</html>
