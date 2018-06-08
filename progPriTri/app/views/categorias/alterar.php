<form method="post" action="">

    <label for="nome">Home</label>

    <input type="hidden" value="<?=$categoria -> getId() ?>"/>

    <input type="text" name="nome" id="nome" value="<?=$categoria -> getNome() ?>"/>

    <br>

    <label for="descricao" id="descricao"> Descricao </label>

    <textarea name="descricao" id="descricao" cols="30" rows="3" <?= $categoria -> getDescricao() ?>>


    </textarea>

    <br>

    <input type="submit" name="gravar" value="Gravar"/>

</form>