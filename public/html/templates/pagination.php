<div class="flex mt-5 mb-2" id="pagination">
    <a class='btn btn-secondary text-center' onclick='<?=$this->updateFunction?>("-")'>Prev</a>
        <?php
for ($i = 1; $i <= $this->pages; $i++) {
    echo "<a class='btn btn-secondary text-center " . ($i == 1 ? 'bold' : '') . "' onclick='$this->updateFunction($i);'>$i</a>";
}?>
    <a class='btn btn-secondary text-center' onclick='<?=$this->updateFunction?>("+")'>Next</a>
</div>