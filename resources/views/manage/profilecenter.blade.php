<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#167DF0">

    <title>Manage Profile</title>
    <link rel="stylesheet" href="https://unpkg.com/buefy/dist/buefy.min.css">
    <link rel="stylesheet" href="/css/self-custom.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" integrity="sha256-PF6MatZtiJ8/c9O9HQ8uSUXr++R9KBYu4gbNG5511WE=" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Poppins|Pridi:400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css" integrity="sha256-a2tobsqlbgLsWs7ZVUGgP5IvWZsx8bTNQpzsqCSm5mk=" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/4.4.95/css/materialdesignicons.min.css" integrity="sha256-Oc9/ZPm5B07aJEXLaFs7vkuVzAO1pKJo8EKmiuqG9Qo=" crossorigin="anonymous" />
    <script src="/js/bulma-toast.min.js"></script>
    <script src="/js/bulma.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <script type="text/javascript">

        $(document).ready(function(){
            $('input[type="file"]').change(function(e){

                var fileName = e.target.files[0].name;
                $("#upload-header").text("Selected");
                $("#upload-filename").text(fileName);
            });
        });

    </script>
</head>

    @include('components.navbar')
    <section class="section is-uppercase" style="margin-bottom: 3em; margin-top: 4em;">
        <div class="container">
            <h1 class="title is-size-2 has-text-weight-bold">Profile</h1>
            <p class="subtitle has-text-justified">จัดการข้อมูลส่วนตัว และการกระทำที่เกี่ยวกับคุณ<b class="force-bold"></b></p>
            <div class="columns">
                <div class="column is-3">
                    <div class="sidebar">
                        @include('components.alert')
                        <aside class="menu">
                            <p class="menu-label">
                                กระเป๋า
                                </p>
                                <ul class="menu-list">
                                    <a class="menu-block" href="{{ route("pocket.index") }}">
                                        <span class="menu-icon icon">
                                            <i class="fas fa-inbox"></i>
                                        </span>
                                        กระเป๋าเก็บของ
                                    </a>
                                </ul>
                            <p class="menu-label">
                                โปรไฟล์ของผู้ใช้
                            </p>
                            <ul class="menu-list">
                                <a class="menu-block" href="{{ route("profile.index") }}">
                                    <span class="menu-icon icon">
                                        <i class="fas fa-id-card"></i>
                                    </span>
                                    โปรไฟล์
                                </a>
                                <a class="menu-block" href="{{ route("profile.changepassword") }}">
                                    <span class="menu-icon icon">
                                        <i class="fas fa-key"></i>
                                    </span>
                                    เปลี่ยนรหัสผ่าน
                                </a>
                            </ul>
                            <p class="menu-label">
                                ประวัติ
                            </p>
                            <ul class="menu-list">
                                <a class="menu-block" href="{{ route("history.index") }}">
                                    <span class="menu-icon icon">
                                        <i class="fas fa-flag-checkered"></i>
                                    </span>
                                    ประวัติกิจกรรมบัญชี
                                </a>
                            </ul>
                            <ul class="menu-list">
                                <a class="menu-block" href="{{ route("paymenthistory.index") }}">
                                    <span class="menu-icon icon">
                                        <i class="fas fa-receipt"></i>
                                    </span>
                                    ประวัติการจ่ายเงิน
                                </a>
                            </ul>
                            <p class="menu-label">
                                เว็บบอร์ด
                            </p>
                            <ul class="menu-list">
                                <a class="menu-block" href="{{ route("topicmanager.index") }}">
                                    <span class="menu-icon icon">
                                        <i class="fas fa-book"></i>
                                    </span>
                                    เรื่องที่โพสต์
                                </a>
                            </ul><hr/>
                        <a class="button is-danger is-fullwidth" href="{{ route('logout') }}">ออกจากระบบ</a>
                        </aside>
                    </div>
                </div>
                <div class="column is-9">
                    <div class="box" style="height: auto">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </section>
@include('components.footer')
</body>
<script>
    $('.clickaction').click(function(){
        document.getElementById("submit_button").classList.add('is-loading');
        $("#verifyform").submit();
    });

</script>
</html>
