<?php
include "../config/database.php";
$q=mysqli_query($conn,"
SELECT c.name,SUM(e.amount) total
FROM expenses e JOIN categories c ON e.category_id=c.id
WHERE e.user_id='{$_SESSION['user']['id']}'
GROUP BY c.name");
?>
<script src="../assets/js/chart.js"></script>
<canvas id="chart"></canvas>
<script>
new Chart(chart,{
type:'pie',
data:{labels:[
<?php while($d=mysqli_fetch_assoc($q)) echo "'$d[name]',"; ?>
],datasets:[{data:[
<?php mysqli_data_seek($q,0); while($d=mysqli_fetch_assoc($q)) echo "$d[total],"; ?>
]}]}
});
</script>
