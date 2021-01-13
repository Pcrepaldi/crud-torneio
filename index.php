<?php
    require_once "./layout/header.php"
?>
    <table class="table-border ">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
            </tr>
        </thead>
        <tbody>
            <?php
                require_once "./classes/Time.php";
                $time = new Time();

                $times = $time->listarTime();
                $total = count($times);

                
                for($i=0; $i<$total; $i++){
                    $color = 'td-white';
                    if($i%2!=0){
                        $color = 'td-gray';
                    }
                    echo "
                        <tr id='$color'>
                            <td>".$times[$i]['id']."</td>"
                           ."<td>".$times[$i]['nome']."</td>"
                       ."<tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>