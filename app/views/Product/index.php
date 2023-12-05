<?php $this->component('pageHead', ['title' => "ProductOverview"]); ?>

<body>
    <div class="container">
        <h1><?= $data['title'] ?></h1>

        <table>
            <thead>
                <tr>
                    <th>Barcode</th>
                    <th>Name</th>
                    <th>Package unit(Kg)</th>
                    <th>Amount in storage</th>
                    <th>Allergy info</th>
                    <th>Delivery info</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($data['products'] as $product) {
                    $thisComponentData = [
                        'tableData' => [
                            $product->barcode,
                            $product->name,
                            $product->packageUnit . " Kg",
                            $product->inStorage
                        ]
                    ];

                    $this->component('tableRow', $thisComponentData);
                }
                ?>
            </tbody>

        </table>
    </div>
</body>

</html>