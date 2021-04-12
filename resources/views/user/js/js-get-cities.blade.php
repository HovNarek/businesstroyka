<script>
    const thisDataID = $("input[name=region]").val();
     $.ajax({
        url: "{{ route('getCities') }}",
        type: "GET",
        data: { DataID: thisDataID },
        dataType: "json",
        success: function (data) {
            for (i = 0; i < Math.floor(data.length / 2); i++) {
                $(".left__city").append(
                    `<li>
                      <a class="city__item" href="" data-id="${data[i].id}"> ${data[i].city_name}</a>
                      </li>`
                );
            }
            for (i = Math.floor(data.length / 2); i < data.length; i++) {
                $(".right__city").append(
                    `<li>
                      <a class="city__item" href="" data-id="${data[i].id}">
                     ${data[i].city_name}
                      </a>
                      </li>`
                );
            }
            // City select
            $(".city__item").on("click", function (e) {
                e.preventDefault();
                $("input[name=city]").val($(this).data("id"));
                $(".city-select").html($(this).html());
                $(".city-block").removeClass("city-block--active");
            });
        }
    });


    // Region select, AJAX
    $(".region__item").on("click", function (e) {
        e.preventDefault();
        const thisDataID = $(this).data("id");
        $(".region-select").html($(this).html());
        $("input[name=region]").val(thisDataID);
        $(".region-block").removeClass("region-block--active");
        $(".left__city li, .right__city li").remove();

        $.ajax({
            url: "{{ route('getCities') }}",
            type: "GET",
            data: { DataID: thisDataID },
            dataType: "json",
            success: function (data) {
                for (i = 0; i < Math.floor(data.length / 2); i++) {
                    $(".left__city").append(
                        `<li>
                      <a class="city__item" href="" data-id="${data[i].id}"> ${data[i].city_name}</a>
                      </li>`
                    );
                }
                for (i = Math.floor(data.length / 2); i < data.length; i++) {
                    $(".right__city").append(
                        `<li>
                      <a class="city__item" href="" data-id="${data[i].id}">
                     ${data[i].city_name}
                      </a>
                      </li>`
                    );
                }
                $(".city-select").text('Все города');
                // City select
                $(".city__item").on("click", function (e) {
                    e.preventDefault();
                    $("input[name=city]").val($(this).data("id"));
                    $(".city-select").html($(this).html());
                    $(".city-block").removeClass("city-block--active");
                });
            }
        });
    });

</script>
