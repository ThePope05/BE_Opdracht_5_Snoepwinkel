<?php $this->component('pageHead', ['title' => "ProductOverview"]); ?>

<body>
    <div class="container">
        <h1 class="title"><?= $data['title'] ?></h1>

        <table>
            <thead>
                <tr>
                    <th>Product name</th>
                    <th>Date last delivery</th>
                    <th>Amount delivered</th>
                    <th>Date next delivery</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $thisComponentData = [
                    'tableData' => [
                        $data['product']['product']->name,
                        $data['product']['delivery']->dateDelivery,
                        $data['product']['delivery']->amount,
                        $data['product']['delivery']->dateNextDelivery
                    ]
                ];

                $this->component('tableRow', $thisComponentData);
                ?>
            </tbody>

        </table>
    </div>
</body>

</html>