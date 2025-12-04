<?php include 'libs/header.php' ?>
<?php
	require "libs/dbconfig.php";

    $get_content = mysqli_query($dbcon, "SELECT * FROM im_page_content WHERE cont_heading = 'Return & Exchange'") or die("Error with querry");
	while ($row = mysqli_fetch_assoc($get_content))
{
 //get data
	$page_content = $row['page_content'];
	$page_heading = $row['cont_heading'];
    
}
										
?>

<section class="bg-pri">
    <div class="container py-4 uppercase text-white text-center text-3xl">
        <?php echo $page_heading; ?>
    </div>
</section>

<section>
    <div class="container py-16 flex flex-col lg:flex-row items-center gap-16">
        <div class="w-full lg:w-1/3">
            <img src="imgs/return_exchange.webp" alt="" class="">
        </div>
        <div class="w-full lg:w-2/3">
            
            <p class=" text-sm lg:text-base">
                <?php  echo $page_content ; ?>
        </p>
        </div>
    </div>
</section>



<?php include 'libs/footer.php' ?>