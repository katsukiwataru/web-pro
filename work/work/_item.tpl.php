<tr>
  <td><input type="radio" name="product_id" value="<?= $item->id ?>"></td>
  <td><?= $item->id ?></td>
  <td><?= $item->name ?></td>
  <td><?= $item->code ?></td>
  <td><?= $item->price ?></td>
  <td>
    <?php if ($item->filepath) { ?>
    <img src="<?= $item->filepath ?>"
      style="width:130px" />
    <?php } ?>
  </td>
  <td><?= $item->color ?></td>
  <td><?= $item->size ?></td>
</tr>
