<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>How to use Alpine.js with Laravel - TechvBlogs</title>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.11.1/dist/cdn.min.js">sha512-Atu8sttM7mNNMon28+GHxLdz4Xo2APm1WVHwiLW9gW4bmHpHc/E2IbXrj98SmefTmbqbUTOztKl5PDPiu0LD/A==" crossorigin="anonymous"></script>
</head>
<body>
    <div x-data="{ show: false }">
        <button @click="show = !show">Show</button>
        <h1 x-show="show">Hello Dek</h1>
    </div>
</body>
</html>