<form action="<? echo route('name_route')?>" method="POST">
    <input name="username" value="Ngọc Đức"/>
    <input name="_token" value="<?php echo csrf_token()?>"/>
    <button type="submit">Submit</button>
</form>