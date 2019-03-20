
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - Admin</title>
</head>
<body>
	Ini dashboard Admin

    <!-- Main Section -->
    <section class="main-section">
        <!-- Add Your Content Inside -->
        <div class="content">
            <!-- Remove This Before You Start -->
            <h1>Anak IT -  Tutorial Login, Register, Validasi dengan Laravel 5.4</h1>
            <p>Hallo, {{Session::get('name')}}. Apakabar?</p>

            <h2>* Username kamu : {{Session::get('username')}}</h2>
            <h2>* Status Login : {{Session::get('login')}}</h2>
            <a href="/logout" class="btn btn-primary btn-lg">Logout</a>

        </div>
        <!-- /.content -->
    </section>
    <!-- /.main-section -->
</body>
</html>