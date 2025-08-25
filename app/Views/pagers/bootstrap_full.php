<?php if ($pager->getPageCount() > 1) : ?>
<div class="d-flex justify-content-between align-items-center mt-3">
    <!-- Keterangan jumlah data -->
    <div class="dataTables_info">
        <?php
            $perPage    = $pager->getPerPage();
            $current    = $pager->getCurrentPage();
            $total      = $pager->getTotal();
            $start      = ($current - 1) * $perPage + 1;
            $end        = min($current * $perPage, $total);
        ?>
        Showing <?= $start ?> to <?= $end ?> of <?= $total ?> entries
    </div>

    <!-- Pagination -->
    <nav aria-label="Page navigation">
        <ul class="pagination mb-0">
            <!-- Previous -->
            <?php if ($pager->hasPrevious()) : ?>
                <li class="page-item">
                    <a class="page-link" href="<?= $pager->getPreviousPage() ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            <?php else : ?>
                <li class="page-item disabled">
                    <span class="page-link">&laquo;</span>
                </li>
            <?php endif ?>

            <!-- Links -->
            <?php foreach ($pager->links() as $link) : ?>
                <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
                    <a class="page-link" href="<?= $link['uri'] ?>">
                        <?= $link['title'] ?>
                    </a>
                </li>
            <?php endforeach ?>

            <!-- Next -->
            <?php if ($pager->hasNext()) : ?>
                <li class="page-item">
                    <a class="page-link" href="<?= $pager->getNextPage() ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            <?php else : ?>
                <li class="page-item disabled">
                    <span class="page-link">&raquo;</span>
                </li>
            <?php endif ?>
        </ul>
    </nav>
</div>
<?php endif ?>