<?php
require_once './config.php';
include './header.php';

if (!(isset($_GET['pagenum']))) {
  $pagenum = 1;
} else {
  $pagenum = $_GET['pagenum'];
}
$page_limit = ($_GET["show"] <> "" && is_numeric($_GET["show"]) ) ? $_GET["show"] : 8;


try {
  $keyword = trim($_GET["keyword"]);
  if ($keyword <> "" ) {
    $sql = "SELECT * FROM offer WHERE 1 AND "
            . " (company_name LIKE :keyword) ORDER BY offer_id desc";
    $stmt = $DB->prepare($sql);
    
    $stmt->bindValue(":keyword", $keyword."%");
    
  } else {
    $sql = "SELECT * FROM offer ORDER BY offer_id desc ";
    $stmt = $DB->prepare($sql);
  }
  
  $stmt->execute();
  $total_count = count($stmt->fetchAll());

  $last = ceil($total_count / $page_limit);

  if ($pagenum < 1) {
    $pagenum = 1;
  } elseif ($pagenum > $last) {
    $pagenum = $last;
  }

  $lower_limit = ($pagenum - 1) * $page_limit;
  $lower_limit = ($lower_limit < 0) ? 0 : $lower_limit;


  $sql2 = $sql . " limit " . ($lower_limit) . " ,  " . ($page_limit) . " ";
  
  $stmt = $DB->prepare($sql2);
  
  if ($keyword <> "" ) {
    $stmt->bindValue(":keyword", $keyword."%");
   }
   
  $stmt->execute();
  $results = $stmt->fetchAll();
} catch (Exception $ex) {
  echo $ex->getMessage();
}
/*******PAGINATION CODE ENDS*****************/
?>
<div class="row">
<?php if ($ERROR_MSG <> "") { ?>
    <div class="alert alert-dismissable alert-<?php echo $ERROR_TYPE ?>">
      <button data-dismiss="alert" class="close" type="button">×</button>
      <p><?php echo $ERROR_MSG; ?></p>
    </div>
<?php } ?>

  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">OFFERS</h3>
    </div>
    <div class="panel-body">

      <div class="col-lg-12" style="padding-left: 0; padding-right: 0;" >
        <form action="offers.php" method="get" >
        <div class="col-lg-6 pull-left"style="padding-left: 0;"  >
          <span class="pull-left">  
            <label class="col-lg-12 control-label" for="keyword" style="padding-right: 0;">
              <input type="text" value="<?php echo $_GET["keyword"]; ?>" placeholder="search organisation" id="" class="form-control" name="keyword" style="height: 41px;">
            </label>
            </span>
          <button class="btn btn-info">search</button>    
        </div>
            
        </form>
      </div>

      <div class="clearfix"></div>
<?php if (count($results) > 0) { ?>
        <div class="table-responsive">
          <table class="table table-striped table-hover table-bordered ">
            <tbody><tr>
                <th>Logo</th>
                <th>Company name</th>
                <th>Title</th>
                <th>Location </th>
                <th>Due Date </th>
                <th>Action</th>
           

              </tr>
  <?php foreach ($results as $res) { ?>
                <tr>
                  <td style="text-align: center;">
                <?php $pic = ($res["company_logo"] <> "" ) ? $res["company_logo"] : "no_avatar.png" ?>
                    <a href="../Work/php/logos/<?php echo $pic ?>" target="_blank"><img src="../Work/php/logos/<?php echo $pic ?>" alt="" width="50" height="50" ></a>
                  </td>
                  <td><?php echo $res["company_name"]; ?></td>
                  <td><?php echo $res["offer_title"]; ?></td>
                  <td><?php echo $res["location"]; ?></td>
                  <td><?php echo $res["offer_closing_date"]; ?></td>
                  <td>
                    <a href="view.php?cid=<?php echo $res["offer_id"]; ?>"><button class="btn btn-sm btn-info"><span class="glyphicon glyphicon-zoom-in"></span> View</button></a>&nbsp;
                    <a href="<?php echo $res["application_link"]; ?>" target="_blank"><button class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-edit"></span>Apply</button></a>&nbsp;
                  </td>
                </tr>
  <?php } ?>
            </tbody></table>
        </div>
        <div class="col-lg-12 center">
          <ul class="pagination pagination-sm">
  <?php
  //Show page links
  for ($i = 1; $i <= $last; $i++) {     
    if ($i == $pagenum) {
      ?>
                <li class="active"><a href="javascript:void(0);" ><?php echo $i ?></a></li>
                <?php
              } else {
                ?>
                <li><a href="dashboard.php?pagenum=<?php echo $i; ?>&keyword=<?php echo $_GET["keyword"]; ?>" class="links"  onclick="displayRecords('<?php echo $page_limit; ?>', '<?php echo $i; ?>');" ><?php echo $i ?></a></li>
                <?php
              }
            }
            ?>
          </ul>
        </div>

          <?php } else { ?>
        <div class="well well-lg">No Offers found.</div>
<?php } ?>
    </div>
  </div>
</div>
      <?php
      include './footer.php';
      ?>