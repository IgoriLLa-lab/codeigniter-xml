<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File List - REMIT group</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        .header-bg {
            background-color: #007bff;
            color: #ffffff;
            height: 60px;
            display: flex;
            align-items: center;
        }
        .main-bg {
            background-color: #ffffff;
            min-height: 80vh;
            padding: 20px 0;
        }
        .table-striped-custom tbody tr:nth-of-type(odd) {
            background-color: #f8f9fa;
        }
        .btn-create {
            background-color: #28a745;
            color: #ffffff;
            border: none;
        }
        .btn-create:hover {
            background-color: #218838;
            color: #ffffff;
        }
    </style>
</head>
<body>

<header class="header-bg">
    <div class="container d-flex justify-content-between align-items-center">
        <div>REMIT cloud</div>
        <div>File list</div>
    </div>
</header>

<main class="main-bg">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Generated files</h2>
            <a href="/contracts/create" class="btn btn-create">Create new file</a>
        </div>
        <table class="table table-striped table-striped-custom">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Created date</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Download</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($contracts)): ?>
                <?php $count = 1; ?>
                <?php foreach ($contracts as $contract): ?>
                    <tr>
                        <td><?php echo $count++; ?></td>
                        <td><?php echo date('Ymd', strtotime($contract['contract_date'])) . '_REMITTable2_V1_' . $contract['id'] . '.xml'; ?></td>
                        <td><?php echo $contract['created_at']; ?></td>
                        <td>
                            <a href="/contracts/edit/<?php echo $contract['id']; ?>" class="action-link">
                                <i class="bi bi-pencil text-black"></i>
                            </a>
                        </td>
                        <td>
                            <form action="/contracts/delete/<?php echo $contract['id']; ?>" method="post" style="display:inline;">
                                <?= csrf_field() ?>
                                <button type="submit" class="action-link" onclick="return confirm('Are you sure you want to delete this contract?');" style="border: none; outline: none; background: transparent;">
                                    <i class="bi bi-trash text-black"></i>
                                </button>
                            </form>
                        </td>
                        <td>
                            <a href="/contracts/download/<?php echo $contract['id']; ?>" class="action-link">
                                <i class="bi bi-download text-black"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">No files found</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>