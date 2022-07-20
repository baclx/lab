<!--search-->
<div class="search-box">
    <input type="text" autocomplete="off" placeholder="Search....">
    <div class="result"></div>
</div>

<script> src="https://code.jquery.com/jquery-3.6.0.min.js" </script>

<script>
    $(document).ready(function() {
        $('.search-box input[type="text"]').on("keyup input", function() {
            var inputVal = $(this).val();
            var resultDropdown = $(this).siblings(".result");

            if (inputVal.length) {
                $.get("backend.php", {term: inputVal}).done(function(data) {
                    resultDropdown.html(data);
                });
                } else {
                resultDropdown.empty();
            }
        });

        $(document).on("click", ".result p", function () {
            $(this).parent(".search-box").find('input[type="text"]').val($(this).text());
            $(this).parent(".result").empty();
        });
    });
</script>