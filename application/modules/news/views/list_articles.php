<div class="row" id="row-message">
    <div class="message-dialog bg-color-yellow fg-color-black" style="display: none;" id="confirm-template" >
        <p id="message-confirm">Content for message dialog</p>
        <button class="place-right" id="cancel-confirm-message">Batal</button>
        <button class="place-right" id="accept-confirm-message" data-id="">Ya</button>
    </div>
</div>
<div class="row" id="row-message1">
    <div class="message-dialog bg-color-yellow fg-color-black" style="display: none;" id="confirm-template1" >
        <p id="message-confirm1">Content for message dialog</p>
        <button class="place-right" id="cancel-confirm-message1">Batal</button>

    </div>
</div>
<table class="striped" id="my-table">
    <thead>
        <tr>
            <th><h3>Daftar Berita</h3></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($news as $row): ?>
        <tr>
            <td><a href=""><?php echo $row->title;?></a></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>