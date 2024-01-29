<?php $this->component('pageHead', ['title' => "ProductOverview"]); ?>

<body>
    <div class="container">
        <h1 class="title"><?= $data['title'] ?></h1>

        <table>
            <thead>
                <tr>
                    <th class="column-1">Barcode</th>
                    <th class="column-2">Name</th>
                    <th class="column-3">Package unit(Kg)</th>
                    <th class="column-4">Amount in storage</th>
                    <th class="column-5">Allergy info</th>
                    <th class="column-6">Delivery info</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($data['products'] as $group) {

                    $allergyEl = "
                        <a href='/Product/AllergyInfo/" . $group['product']->id . "' class='danger'>
                            <span class='material-symbols-rounded'>
                                error
                            </span>
                        </a>
                    ";

                    $deliveryEl = "
                        <a href='/Product/DeliveryInfo/" . $group['product']->id . "'>
                            <span class='material-symbols-rounded'>
                                local_shipping
                            </span>
                        </a>
                    ";

                    $thisComponentData = [
                        'tableData' => [
                            $group['product']->barcode,
                            $group['product']->name,
                            $group['storageData']->packageUnit . " Kg",
                            $group['storageData']->inStorage,
                            $allergyEl,
                            $deliveryEl
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