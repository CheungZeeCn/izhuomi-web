<div class="container">

    <div id = "header" style="background-color:#FFFFC2;height:200px;width:900px;">
    </div>

    <div style="font-family:verdana;position:absolute;padding:15px;left:320px;top:80px;height:260px;width:250px;border-radius:10px;border:10px solid #FFFFFF;background-color:#FFFFC2">
        <img src="http://static.comicvine.com/uploads/original/11116/111164870/3842465-1216439145-batma.png"  style="height:213px;width:205px;">
        </img>
    </div>
    <div id = "menu" style="background-color:#3090C7;height:600px;width:150px;float:left;">
    <br><br><br><br><br><br><br><br>
    <!--<br><b>Profile<b><br>
    <br>Notes<br>
    <br>Setting-->
    <button style="width:144px;margin:3px 3px 7px 3px;"><a href="#">Profile</a></button>
    <button style="width:144px;margin:7px 3px 3px 3px;"><a href="#">Notes</a></button>
    </div>

    <div id = "content" style="background-color:#B6B6B4;width:750px;float:left;">
        <br><br><br><br><br><br><br><br>
    
    <div style="margin:30px 30px 30px 30px;width:690px;background-color:#FFFFC2;text-align:center;">
        <br>
        <p style="font-size:20px;">單詞表<p>
        <table style="margin:20px 50px 20px 60px;width=300px;font-size:15px;text-align:center;" border="5" cellpadding="20">
            <tr>
                <th>word id</th>
                <th>user id</th> 
                <th>word name</th>
                <th>word explain</th>
                <th>created time</th>
            </tr>

            <?php foreach($izWordlists as $wl):?>
            <tr>
                <td><?php echo $wl['IzWordlist']['id']; ?></td>
                <td><?php echo $wl['IzWordlist']['user_id']; ?></td> 
                <td><?php echo $wl['IzWordlist']['name']; ?></td>
                <td><?php echo $wl['IzWordlist']['description']; ?></td>
                <td><?php echo $wl['IzWordlist']['created']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <br><br>
    </div>
        <br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br>
    </div>

    <div id = "footer"  style="background-color:#FFFFC2;height:30px;width=880px;clear:both;">
    </div>
</div>
