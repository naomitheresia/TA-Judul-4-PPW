<?php
include "config.php";
requireLogin();
$contacts = loadContacts();
?>
<!DOCTYPE html>
<html>
<head>
<title>Manajemen Kontak</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-green-50 min-h-screen px-6 py-6">

<header class="flex justify-between items-center mb-6">

  <div class="flex items-center gap-3">
     <svg class="w-12 h-12 text-green-700" fill="none" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
     </svg>

     <div>
        <h1 class="text-3xl font-bold text-green-700">Manajemen Kontak</h1>
        <p class="text-green-600 -mt-1">Selamat datang, <b><?= $_SESSION["user"] ?></b>!</p>
     </div>
  </div>

  <div class="flex gap-3">
    <a href="add.php"
    class="bg-green-500 text-white px-5 py-2 rounded-full flex items-center gap-2 hover:bg-green-600 transition-colors">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
      </svg>
      Tambah Kontak
    </a>

    <a href="logout.php"
    class="border border-green-500 text-green-700 px-5 py-2 rounded-full hover:bg-green-200 transition-colors flex items-center gap-2">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
      </svg>
      Keluar
    </a>
  </div>

</header>

<div class="bg-white p-4 rounded-xl border mb-4 flex items-center gap-3">
  <svg class="w-7 h-7 text-green-600" fill="none" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
     <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
  </svg>
  <p class="text-green-700 font-medium text-lg">
     <b><?= count($contacts) ?></b> kontak tersimpan
  </p>
</div>

<div class="mb-4 relative">
  <svg class="w-5 h-5 text-gray-400 absolute left-4 top-3.5" fill="none" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
  </svg>
  <input class="w-full border rounded-full pl-12 pr-4 py-3 border-green-300 focus:border-green-500 focus:outline-none"
  placeholder="Cari kontak... (belum aktif)">
</div>

<div class="grid gap-4">

<?php foreach($contacts as $i=>$c): ?>
<div class="p-5 bg-white rounded-xl border border-green-200 shadow hover:shadow-md transition-shadow flex items-start gap-4">

  <div class="bg-green-100 p-3 rounded-full">
    <svg class="w-8 h-8 text-green-600" fill="none" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
    </svg>
  </div>

 <div class="flex-1">
   <h2 class="text-xl font-bold text-green-700"><?=htmlspecialchars($c["name"])?></h2>
   <p class="text-green-500 text-sm font-medium mb-2"><?=htmlspecialchars($c["category"])?></p>
   
   <div class="space-y-1 text-gray-700">
     <div class="flex items-center gap-2">
       <svg class="w-4 h-4 text-green-600" fill="none" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
         <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
       </svg>
       <span><?=htmlspecialchars($c["phone"])?></span>
     </div>
     
     <div class="flex items-center gap-2">
       <svg class="w-4 h-4 text-green-600" fill="none" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
         <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
       </svg>
       <span><?=htmlspecialchars($c["email"])?></span>
     </div>
     
     <?php if($c["address"]): ?>
     <div class="flex items-center gap-2">
       <svg class="w-4 h-4 text-green-600" fill="none" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
         <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
         <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
       </svg>
       <span><?=htmlspecialchars($c["address"])?></span>
     </div>
     <?php endif ?>
   </div>
 </div>

 <div class="flex flex-col gap-2">
   <a href="edit.php?id=<?=$i?>" class="text-blue-600 hover:scale-110 transition-transform p-2">
     <svg class="w-6 h-6" fill="none" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
       <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
     </svg>
   </a>
   <a href="delete.php?id=<?=$i?>" onclick="return confirm('Hapus kontak ini?')" class="text-red-600 hover:scale-110 transition-transform p-2">
     <svg class="w-6 h-6" fill="none" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
       <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
     </svg>
   </a>
 </div>

</div>
<?php endforeach; ?>

<?php if(empty($contacts)): ?>
<div class="text-center py-16">
  <svg class="w-24 h-24 mx-auto text-gray-300 mb-4" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
  </svg>
  <p class="text-gray-400 text-lg font-medium">Belum ada kontak tersimpan</p>
  <p class="text-gray-400 text-sm mt-1">Klik tombol "Tambah Kontak" untuk mulai menambahkan</p>
</div>
<?php endif; ?>

</div>
</body>
</html>