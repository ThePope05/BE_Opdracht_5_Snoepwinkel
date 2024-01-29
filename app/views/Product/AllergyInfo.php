<?php $this->component('pageHead', ['title' => "ProductOverview"]); ?>

<body>
    <div class="container">
        <h1 class="title"><?= $data['title'] ?></h1>

        <table>
            <thead>
                <tr>
                    <th class="column-1">Name</th>
                    <th class="column-2">Description</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($data['allergyData'] as $group) {

                    $thisComponentData = [
                        'tableData' => [
                            $group->name,
                            $group->description
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