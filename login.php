<?php
include "config.php";
$error = "";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    if($_POST["username"] === "naomi" && $_POST["password"]==="123456"){
        $_SESSION["user"] = "NAOMI";
        header("Location:index.php");
        exit;
    }
    $error = "Username atau password salah";
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-green-100 flex items-center justify-center min-h-screen">

<div class="bg-white p-8 rounded-2xl border border-green-300 shadow-xl w-full max-w-md">

<h2 class="text-2xl font-bold text-center text-green-600 mb-5 flex items-center justify-center gap-2">
 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 flex-shrink-0">
  <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
</svg> Login Aplikasi Kontak
</h2>

<?php if($error): ?>
<div class="bg-red-100 text-red-600 p-3 rounded mb-4 text-center"><?=$error?></div>
<?php endif; ?>

<form method="POST" class="space-y-4">

<div>
<label class="font-semibold">Username</label>
<input name="username" class="w-full border rounded px-3 py-2">
</div>

<div>
<label class="font-semibold">Password</label>
<input type="password" name="password" class="w-full border rounded px-3 py-2">
</div>

<button class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600">
Masuk
</button>

</form>
</div>

</body>
</html>
