<?php
include "config.php";
requireLogin();

$errors = [];

$CATEGORIES = [
  "Keluarga" => "M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z",
  "Teman" => "M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z",
  "Kerja" => "M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z",
  "Bisnis" => "M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4",
  "Lainnya" => "M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"
];

// AMBIL DATA KONTAK BERDASARKAN ID
$id = $_GET["id"] ?? null;
$all = loadContacts();

if ($id === null || !isset($all[$id])) {
    header("Location: index.php");
    exit;
}

$contact = $all[$id];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = [
      "name" => trim($_POST["name"]),
      "email" => trim($_POST["email"]),
      "phone" => trim($_POST["phone"]),
      "category" => $_POST["category"] ?? "",
      "address" => trim($_POST["address"])
    ];

    if (strlen($data["name"]) < 3) $errors[] = "Nama minimal 3 huruf";
    if (!filter_var($data["email"], FILTER_VALIDATE_EMAIL)) $errors[] = "Email tidak valid";
    if (!preg_match("/^[0-9]+$/", $data["phone"])) $errors[] = "Telepon hanya angka";

    if (!$errors) {
        // UPDATE DATA KONTAK 
        $all[$id] = $data;
        saveContacts($all);
        header("Location: index.php");
        exit;
    } else {
        // Jika ada error, gunakan data dari POST
        $contact = $data;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Edit Kontak</title>
</head>

<body class="bg-green-50 min-h-screen flex items-center justify-center p-6">

<div class="w-full max-w-2xl bg-white p-8 rounded-2xl shadow-lg border border-green-200">

  <div class="flex justify-between items-center mb-6">
    <div class="flex items-center gap-3">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
      </svg>
      <h2 class="text-3xl font-bold text-green-700">Edit Kontak</h2>
    </div>
    <a href="index.php" class="text-red-500 hover:text-red-700 transition-colors">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </a>
  </div>

  <?php if ($errors): ?>
  <div class="bg-red-100 border border-red-400 text-red-700 p-4 rounded-lg mb-6 flex items-start">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
      <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    <div>
      <?php foreach ($errors as $e): ?>
        <p class="font-medium">• <?= htmlspecialchars($e) ?></p>
      <?php endforeach; ?>
    </div>
  </div>
  <?php endif; ?>


  <form method="POST" class="space-y-5">

    <div>
      <label class="block text-green-800 font-semibold mb-2">
        Nama Lengkap <span class="text-red-500">*</span>
      </label>
      <input name="name" 
             class="w-full border-2 px-4 py-3 rounded-lg border-green-300 focus:border-green-500 focus:outline-none transition-colors" 
             placeholder="Masukkan nama lengkap"
             value="<?= htmlspecialchars($contact['name']) ?>"
             required>
    </div>

    <div>
      <label class="block text-green-800 font-semibold mb-2">
        Email <span class="text-red-500">*</span>
      </label>
      <input name="email" 
             type="email" 
             class="w-full border-2 px-4 py-3 rounded-lg border-green-300 focus:border-green-500 focus:outline-none transition-colors" 
             placeholder="contoh@email.com"
             value="<?= htmlspecialchars($contact['email']) ?>"
             required>
    </div>

    <div>
      <label class="block text-green-800 font-semibold mb-2">
        Nomor Telepon <span class="text-red-500">*</span>
      </label>
      <input name="phone" 
             class="w-full border-2 px-4 py-3 rounded-lg border-green-300 focus:border-green-500 focus:outline-none transition-colors" 
             placeholder="08xxxxxxxxxx"
             value="<?= htmlspecialchars($contact['phone']) ?>"
             required>
    </div>

    <div>
      <label class="block text-green-800 font-semibold mb-3">
        Kategori Kontak <span class="text-red-500">*</span>
      </label>
      <div class="grid grid-cols-5 gap-3">
        <?php foreach ($CATEGORIES as $label => $iconPath): ?>
        <label class="cursor-pointer">
          <input type="radio" 
                 name="category" 
                 value="<?= $label ?>" 
                 class="peer hidden" 
                 <?= ($contact['category'] === $label) ? 'checked' : '' ?>
                 required>
          <div class="border-2 border-green-300 p-4 rounded-xl text-center hover:border-green-400 peer-checked:bg-green-600 peer-checked:border-green-600 peer-checked:text-white transition-all duration-200 hover:shadow-md">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="<?= $iconPath ?>" />
            </svg>
            <p class="text-sm font-semibold"><?= $label ?></p>
          </div>
        </label>
        <?php endforeach; ?>
      </div>
    </div>

    <div>
      <label class="block text-green-800 font-semibold mb-2">
        Alamat <span class="text-gray-400 text-sm">(opsional)</span>
      </label>
      <textarea name="address" 
                class="w-full border-2 px-4 py-3 rounded-lg border-green-300 focus:border-green-500 focus:outline-none transition-colors resize-none" 
                rows="3"
                placeholder="Masukkan alamat lengkap"><?= htmlspecialchars($contact['address']) ?></textarea>
    </div>

    <div class="flex justify-between gap-4 pt-4">
      <a href="index.php" 
         class="flex items-center gap-2 px-6 py-3 border-2 rounded-lg text-green-700 border-green-400 hover:bg-green-50 font-semibold transition-colors">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Batal
      </a>
      <button type="submit"
              class="flex items-center gap-2 px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 font-semibold transition-colors shadow-md hover:shadow-lg">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
        </svg>
        Simpan Perubahan
      </button>
    </div>

  </form>

</div>

</body>
</html>