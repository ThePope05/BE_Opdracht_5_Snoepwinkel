<?php
$componentData = [
    'title' => 'Homepage',
];
$this->component('pageHead', $componentData);
?>

<body>
    <h1><?= $data['title']; ?></h1>
</body>

</html>