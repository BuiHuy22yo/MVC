<h1>Stu</h1>
<div class="row col-md-12 centered">
    <table class="table table-striped custab">
        <thead>
            <a href="/MVC/stu/create/" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new stu</a>
            <tr>
                <th>ID</th>
                <th>Task</th>
                <th>Description</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <?php
        foreach ($stu as $st) {
            echo '<tr>';
            echo "<td>" . $st->id . "</td>";
            echo "<td>" . $st->title . "</td>";
            echo "<td>" . $st->description . "</td>";
            echo "<td class='text-center'><a class='btn btn-info btn-xs' href='/MVC/stu/edit/" . $st->id . "' ><span class='glyphicon glyphicon-edit'></span> Edit</a> <a href='/MVC/stu/delete/" . $st->id . "' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Del</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>