<?php
include 'libs/dbconfig.php';
session_start();

if (!isset($_SESSION['sm_id'])) {
    echo "<p>Please login to see addresses</p>";
    exit;
}

$sm_id = $_SESSION['sm_id'];
$fetch = "SELECT * FROM sm_addressbook WHERE ab_uid = '$sm_id'";
$result = mysqli_query($dbcon, $fetch);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
<div class="addressBox border border-gray-200 rounded-xl p-5 bg-white shadow-sm hover:shadow-lg transition-shadow duration-300 cursor-pointer"
    data-id="<?php echo $row['ab_id']; ?>" data-address="<?php echo htmlspecialchars($row['ab_address']); ?>"
    data-apartment="<?php echo htmlspecialchars($row['ab_appartment_suite'] ?: '-'); ?>"
    data-city="<?php echo htmlspecialchars($row['ab_city']); ?>"
    data-state="<?php echo htmlspecialchars($row['ab_state'] ?: '-'); ?>"
    data-country="<?php echo htmlspecialchars($row['ab_country']); ?>"
    data-postal="<?php echo htmlspecialchars($row['ab_postal_code']); ?>">

    <div class="flex justify-between items-center mb-3">
        <span class="text-xs sm:text-sm text-gray-500"><?php echo htmlspecialchars($row['ab_postal_code']); ?></span>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-gray-700 text-xs sm:text-sm">
        <div>
            <span class="font-medium">Address:</span>
            <span class="block text-gray-600 mt-1"><?php echo htmlspecialchars($row['ab_address']); ?></span>
        </div>
        <div>
            <span class="font-medium">Apartment/Suite:</span>
            <span
                class="block text-gray-600 mt-1"><?php echo htmlspecialchars($row['ab_appartment_suite'] ?: '-'); ?></span>
        </div>
        <div>
            <span class="font-medium">City:</span>
            <span class="block text-gray-600 mt-1"><?php echo htmlspecialchars($row['ab_city']); ?></span>
        </div>
        <div>
            <span class="font-medium">State:</span>
            <span class="block text-gray-600 mt-1"><?php echo htmlspecialchars($row['ab_state'] ?: '-'); ?></span>
        </div>
        <div>
            <span class="font-medium">Country:</span>
            <span class="block text-gray-600 mt-1"><?php echo htmlspecialchars($row['ab_country']); ?></span>
        </div>
    </div>

    <div class="mt-4 flex justify-end">
        <button type="button"
            class="deleteAddressBtn bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition"
            data-id="<?php echo $row['ab_id']; ?>">
            <i class="bi bi-trash"></i>
        </button>
    </div>
</div>
<?php
    }
}
?>