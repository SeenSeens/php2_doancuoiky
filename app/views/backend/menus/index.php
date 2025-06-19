<?php
$menu_location = $this->data['sub_content']['menu_locations'];
$menu_data =$this->data['sub_content']['data_menu'];
$menuItems = [
    'post' => 'Bài viết',
    'pages' => 'Trang',
    'category' => 'Chuyên mục',
    'tag' => 'Thẻ',
    'product_cat' => 'Danh mục sản phẩm',
    'product_tag' => 'Thẻ sản phẩm',
    'product_brand' => 'Thương hiệu',
];
$this->render('backend/components/breadcrumb');
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-lg-4">
            <h2>Thêm các mục menu</h2>
            <div class="accordion accordion-flush" id="">
                <?php
                $index = 0;
                foreach ($menuItems as $key => $label) :
                    $items = $menu_data[$key] ?? [];
                    $collapseId = "collapse" . ucfirst($key);
                ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading<?= $index ?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $collapseId ?>" aria-expanded="false">
                            <?= $label ?>
                        </button>
                    </h2>
                    <div id="<?= $collapseId ?>" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <?php if (!empty($items)): ?>
                                <ul class="list-unstyled">
                                    <?php foreach ($items as $item): ?>
                                        <li>
                                            <?php if ($key === 'post' || $key === 'pages'): ?>
                                                <label>
                                                    <input type="checkbox" class="form-check-inline menu-item-checkbox" name="menu_items[]" value="<?= $item['slug'] ?>" data-slug="<?= $item['slug'] ?>">
                                                    <?= htmlspecialchars($item['title']) ?>
                                                </label>
                                            <?php else: ?>
                                                <label>
                                                    <input type="checkbox" class="form-check-inline menu-item-checkbox" name="menu_items[]" value="<?= $item['slug'] ?>" data-slug="<?= $item['slug'] ?>">
                                                    <?= htmlspecialchars($item['name']) ?>
                                                </label>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                    <button type="button" class="btn btn-sm btn-primary add-to-menu-btn">Thêm vào menu</button>
                                </ul>
                            <?php else: ?>
                                <p><em>Không có dữ liệu.</em></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php $index++; endforeach; ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#custom-link" aria-expanded="false">
                            Liên kết tự tạo
                        </button>
                    </h2>
                    <div id="custom-link" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <ul class="list-unstyled">
                                <li>
                                    <label for="url">URL</label>
                                    <input type="text" id="url" class="form-control" name="url" placeholder="URL">
                                </li>
                                <li>
                                    <label for="title">Tên đường dẫn</label>
                                    <input type="text" id="title" class="form-control" name="title" placeholder="Tên đường dẫn">
                                </li>
                                <button type="button" class="btn btn-sm btn-primary add-to-menu-btn">Thêm vào menu</button>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-lg-8">
            <div>
                <h2>Cấu trúc menu</h2>
                <p>Tên menu</p>
                <ul id="menu-structure" class="list-group list-unstyled mt-3">
                </ul>
            </div>
            <hr>
            <div>
                <h3>Thiết lập menu</h3>
                <p>Vị trí hiển thị</p>
                <ul class="list-unstyled" id="menu-location">
                    <?php foreach ($menu_location as $location): ?>
                        <li>
                            <input type="checkbox" class="form-check-inline menu-location-checkbox" value="<?= $location['id'] ?>">
                            <label for=""><?= $location['name']?></label>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <button type="button" id="save-menu-btn" class="btn btn-sm btn-primary">Lưu menu</button>
            </div>
        </div>
    </div>
</div>
<script src="<?= __WEB_ROOT__ . '/public/admin/assets/js/Sortable.min.js' ?>"></script>
<script>
    class MenuBuilder {
        initAddToMenu() {
            const addToMenuButtons = document.querySelectorAll(".add-to-menu-btn");
            addToMenuButtons.forEach(button => {
                button.addEventListener("click", function () {
                    const container = button.closest(".accordion-body");
                    const checkboxes = container.querySelectorAll(".menu-item-checkbox:checked");
                    const menuStructure = document.getElementById("menu-structure");
                    // Nếu có checkbox, xử lý như cũ
                    if (checkboxes.length > 0) {
                        checkboxes.forEach(checkbox => {
                            const label = checkbox.parentElement.textContent.trim();
                            const value = checkbox.value;
                            const slug = checkbox.dataset.slug;
                            appendMenuItem(label, slug, value, menuStructure);
                            checkbox.checked = false;
                        });
                    } else {
                        // Nếu không có checkbox, kiểm tra input URL và tên
                        const urlInput = container.querySelector('input[name="url"]');
                        const titleInput = container.querySelector('input[name="title"]');
                        const url = urlInput.value.trim();
                        const title = titleInput.value.trim();

                        if (url && title) {
                            const randomId = Date.now(); // tạm làm id duy nhất
                            appendMenuItem(title, url, `custom-${randomId}`, menuStructure);
                            urlInput.value = "";
                            titleInput.value = "";
                        }
                    }
                });
            });
            function appendMenuItem(label, slug, value, menuStructure) {
                // Tạo li bao bọc toàn bộ accordion
                const li = document.createElement("li");
                li.className = "menu-item list-group-item";
                // Tạo phần tử accordion
                const accordion = document.createElement("div");
                accordion.className = "accordion accordion-flush";
                // Tạo phần tử accordion item
                const accordionItem = document.createElement("div");
                accordionItem.className = "accordion-item";

                const headerId = `heading-${value.replace(/[:_]/g, "-")}`;
                const collapseId = `collapse-${value.replace(/[:_]/g, "-")}`;

                // Header
                const header = document.createElement("h2");
                header.className = "accordion-header";
                header.id = headerId;

                const button = document.createElement("button");
                button.className = "accordion-button collapsed d-flex justify-content-between align-items-center";
                button.type = "button";
                button.setAttribute("data-bs-toggle", "collapse");
                button.setAttribute("data-bs-target", `#${collapseId}`);
                button.setAttribute("aria-expanded", "false");
                button.setAttribute("aria-controls", collapseId);
                button.innerHTML = `<span>${label}</span>`;

                header.appendChild(button);

                // Collapse body
                const collapseDiv = document.createElement("div");
                collapseDiv.id = collapseId;
                collapseDiv.className = "accordion-collapse collapse";
                collapseDiv.setAttribute("aria-labelledby", headerId);

                const bodyDiv = document.createElement("div");
                bodyDiv.className = "accordion-body";

                const labelCanonical = document.createElement("label");
                labelCanonical.setAttribute("for", `canonical-${value}`);
                labelCanonical.className = "text-capitalize";
                labelCanonical.textContent = "Nhãn điều hướng";

                const inputCanonical = document.createElement("input");
                inputCanonical.className = "form-control mb-2";
                inputCanonical.setAttribute("type", "text");
                inputCanonical.setAttribute("name", "canonical");
                inputCanonical.setAttribute("id", `canonical-${value}`);
                inputCanonical.value = `${label}`;

                const inputUrl = document.createElement("input");
                inputUrl.type = "hidden";
                inputUrl.name = "url[]";
                inputUrl.value = `${slug}`;

                // ⚡ Thêm sự kiện cập nhật tiêu đề accordion
                inputCanonical.addEventListener("input", (e) => {
                    const newValue = e.target.value.trim();
                    button.innerHTML = `<span>${newValue || label}</span>`;
                });

                const removeBtn = document.createElement("a");
                removeBtn.className = "text-danger";
                removeBtn.textContent = "Xoá";
                removeBtn.onclick = () => li.remove();

                bodyDiv.appendChild(labelCanonical);
                bodyDiv.appendChild(inputCanonical);
                bodyDiv.appendChild(inputUrl);
                bodyDiv.appendChild(removeBtn);
                collapseDiv.appendChild(bodyDiv);

                // Gắn tất cả vào li
                accordionItem.appendChild(header);
                accordionItem.appendChild(collapseDiv);
                accordion.appendChild(accordionItem);
                li.appendChild(accordion);

                // Thêm li vào danh sách menu
                menuStructure.appendChild(li);
            }
        }
        initSortable() {
            const menuList = document.getElementById("menu-structure");
            const sortable = Sortable.create(menuList, {
            });
        }

        initSaveMenu() {
            const saveBtn = document.getElementById("save-menu-btn");
            if (!saveBtn) return;

            saveBtn.addEventListener("click", async () => {
                const menuItems = [];
                const locationsArray = Array.from(document.querySelectorAll(".menu-location-checkbox:checked"))
                    .map(cb => cb.value);
                const locations = locationsArray.join(',');
                const menuName = "Main Menu"; // Hoặc lấy từ input nếu có

                document.querySelectorAll("#menu-structure .menu-item").forEach((item, index) => {
                    const title = item.querySelector("input[name='canonical']").value.trim();
                    const urlInput = item.querySelector('input[type="hidden"][name="url[]"]');
                    const url = urlInput ? urlInput.value : "#";
                    menuItems.push({
                        menu_id: locations,
                        title: title,
                        url: url,
                    });
                });

                try {
                    const response = await axios.post('<?= __WEB_ROOT__ . '/admin/menu/add' ?>', {
                        name: menuName,
                        locations: locations,
                        items: menuItems
                    });

                    if (response.data && response.data.message) {
                        alert(response.data.message);
                    } else {
                        alert("Menu đã được lưu thành công!");
                    }
                } catch (error) {
                    console.error("❌ Lỗi khi gửi dữ liệu menu:", error);

                    if (error.response) {
                        console.error("📄 Phản hồi lỗi từ server:", error.response.data);
                        alert("Lỗi từ server: " + (error.response.data.message || "Không rõ"));
                    } else {
                        alert("Có lỗi xảy ra khi lưu menu!");
                    }
                }

            });
        }

    }
    document.addEventListener("DOMContentLoaded", function () {
        const menu = new MenuBuilder();
        menu.initAddToMenu();
        menu.initSortable();
        menu.initSaveMenu();
    });
</script>
