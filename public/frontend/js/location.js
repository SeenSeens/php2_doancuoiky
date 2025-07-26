'use strict';
class LocationSelectorJquery {
    constructor(provinceSelectorId, districtSelectorId, wardSelectorId) {
        this.$provinceSelect = $(`#${provinceSelectorId}`);
        this.$districtSelect = $(`#${districtSelectorId}`);
        this.$wardSelect = $(`#${wardSelectorId}`);
        this.baseUrl = typeof BASE_URL !== "undefined" ? BASE_URL : '';

        this.init();
    }

    init() {
        this.loadProvinces();

        this.$provinceSelect.on("change", () => {
            const provinceCode = this.$provinceSelect.val();
            this.loadDistricts(provinceCode);
        });

        this.$districtSelect.on("change", () => {
            const districtCode = this.$districtSelect.val();
            this.loadWards(districtCode);
        });
    }

    loadProvinces() {
        $.ajax({
            url: `${this.baseUrl}/location/provinces`,
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                console.log(data);
                this.populateSelect(this.$provinceSelect, data, "-- Chọn tỉnh/thành --");
            },
            error: (xhr, status, error) => {
                console.error("Lỗi khi tải tỉnh:", error);
            }
        });
    }

    loadDistricts(provinceCode) {
        this.resetSelect(this.$districtSelect, "-- Chọn quận/huyện --");
        this.resetSelect(this.$wardSelect, "-- Chọn phường/xã --");

        if (!provinceCode) return;

        $.ajax({
            url: `${this.baseUrl}/location/districts`,
            method: 'GET',
            data: { province_code: provinceCode },
            dataType: 'json',
            success: (data) => {
                this.populateSelect(this.$districtSelect, data, "-- Chọn quận/huyện --");
            },
            error: (xhr, status, error) => {
                console.error("Lỗi khi tải huyện:", error);
            }
        });
    }

    loadWards(districtCode) {
        this.resetSelect(this.$wardSelect, "-- Chọn phường/xã --");

        if (!districtCode) return;

        $.ajax({
            url: `${this.baseUrl}/location/wards`,
            method: 'GET',
            data: { district_code: districtCode },
            dataType: 'json',
            success: (data) => {
                this.populateSelect(this.$wardSelect, data, "-- Chọn phường/xã --");
            },
            error: (xhr, status, error) => {
                console.error("Lỗi khi tải xã:", error);
            }
        });
    }

    populateSelect($selectElement, data, placeholder) {
        this.resetSelect($selectElement, placeholder);
        data.forEach(item => {
            $selectElement.append(`<option value="${item.code}">${item.name}</option>`);
        });
    }

    resetSelect($selectElement, placeholderText = "") {
        $selectElement.empty().append(`<option value="">${placeholderText}</option>`);
    }
}