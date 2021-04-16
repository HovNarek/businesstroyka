<script>
    getCitiesByRegionId();

    let user_type = document.getElementById('user_type1');
    if (user_type.checked) {
        document.querySelector('.spec_div').style.display = 'flex';
    } else {
        document.querySelector('.spec_div').style.display = 'none';
    }

    document.querySelectorAll('input[name="user_type"]').forEach(function (item) {
        item.addEventListener('change', function (e) {
            if (document.getElementById('user_type1').checked) {
                document.querySelector('.spec_div').style.display = 'flex';
            } else {
                document.querySelector('.spec_div').style.display = 'none';
                document.getElementById('specialization').value = '1';
            }
        });
    })

    // document.getElementById('avatar')
    //     .addEventListener('change', showAvatar);

    document.getElementById('avatar')
        .addEventListener('change', function (e) {
            let avatar_url = URL.createObjectURL(document.querySelector('input[name="avatar"]').files[0]);
            let user_avatar = document.querySelector('.user_avatar');
            user_avatar.src = avatar_url;
            document.querySelector('.avatar_div').addEventListener('mouseover', showClose);
            document.querySelector('.avatar_div').addEventListener('mouseout', hideClose);

            document.querySelector('.delete_image')
                .addEventListener('click', function (e) {
                    document.querySelector('.delete_image').style.display = "none";
                    document.querySelector('.avatar_div').removeEventListener('mouseover', showClose);
                    document.querySelector('.avatar_div').removeEventListener('mouseout', hideClose);
                    document.querySelector('.user_avatar').src = "{{ asset('avatar.svg') }}";
                });
        });

    document.getElementById('region')
        .addEventListener('change', getCitiesByRegionId);

    document.querySelector('.phones-add')
        .addEventListener('click', function (e) {
            e.preventDefault();
            let phone_div = document.querySelectorAll('.phone');
            if (phone_div.length === 3) return;
            let phone = `
                <div class="phone mb-1">
                    <input type="text" class="form-control phone_input" name="phones[]">
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            `;
            this.insertAdjacentHTML('beforebegin', phone);

            document.querySelectorAll('.close').forEach(function (item) {
                item.addEventListener('click', function (e) {
                    this.parentNode.remove();
                })
            })
        });


    document.querySelector('.emails-add')
        .addEventListener('click', function (e) {
            e.preventDefault();
            let emails_div = document.querySelectorAll('.emails');
            if (emails_div.length === 3) return;
            let emails = `
                <div class="emails mb-1">
                    <input type="text" class="form-control emails_input" name="emails[]">
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            `;
            this.insertAdjacentHTML('beforebegin', emails);

            document.querySelectorAll('.close').forEach(function (item) {
                item.addEventListener('click', function (e) {
                    this.parentNode.remove();
                })
            })
        });

    document.querySelector('.site-add')
        .addEventListener('click', function (e) {
            e.preventDefault();
            let site_div = document.querySelectorAll('.site');
            if (site_div.length === 1) return;
            let site = `
                <div class="site mb-1">
                    <input type="text" class="form-control site_input" name="site">
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            `;
            this.insertAdjacentHTML('beforebegin', site);

            document.querySelectorAll('.close').forEach(function (item) {
                item.addEventListener('click', function (e) {
                    this.parentNode.remove();
                })
            })
        });

    {{--async function showAvatar() {--}}
    {{--    let avatar = document.querySelector('input[name="avatar"]').files[0];--}}
    {{--    let form_data = new FormData();--}}
    {{--    form_data.append("avatar", avatar);--}}
    {{--    form_data.append("_token", "{{csrf_token()}}");--}}

    {{--    let response = await fetch('{{ route('showAvatar') }}', {--}}
    {{--        method: 'POST',--}}
    {{--        body: form_data--}}
    {{--    });--}}
    {{--    if (response.ok) {--}}
    {{--        let url = await response.text();--}}
    {{--        document.querySelector('.user_avatar').src = url;--}}
    {{--    }--}}
    {{--}--}}

    async function getCitiesByRegionId() {
        let region_id = document.getElementById('region').value;
        let response = await fetch('{{ route('getCities') }}?DataID=' + region_id);
        if (response.ok) {
            let data = await response.json();
            let cities = document.getElementById('city');

            let options = cities.querySelectorAll('option');
            options.forEach(function (option) {
                option.remove();
            })

            let city = '<option value="0">- город -</option>';
            data.forEach(function (item) {
                city += `
                    <option value=${item.id}>${item.city_name}</option>
                `;
            });
            cities.insertAdjacentHTML('beforeend', city);
        }
    }

    function showClose() {
        document.querySelector('.delete_image').style.display = "block";
    }
    function hideClose() {
        document.querySelector('.delete_image').style.display = "none";
    }

</script>
