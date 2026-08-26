<?php
session_start();

$currentUser = [
    'name' => 'Mr. Olatokun',
    'role' => 'Administrator',
];

$menuGroups = [
    [
        'label' => 'Biometric',
        'expanded' => true,
        'items' => [
            ['label' => 'Temporary ID card', 'active' => false, 'children' => []],
            ['label' => 'Permanent ID card', 'active' => true, 'children' => [
                ['label' => 'View permanent ID card', 'active' => false],
                ['label' => 'Generate temporary ID card', 'active' => false],
            ]],
        ],
    ],
    ['label' => 'Biometric Inner', 'expanded' => false, 'items' => []],
    ['label' => 'Academic Structure', 'expanded' => false, 'items' => []],
    ['label' => 'Course Control', 'expanded' => false, 'items' => []],
    ['label' => 'Dashboards', 'expanded' => false, 'items' => []],
    ['label' => 'Gap Analysis', 'expanded' => false, 'items' => []],
    ['label' => 'Report', 'expanded' => false, 'items' => []],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permanent ID Card Generator</title>
    <style>
        :root {
            --page-bg: #f5f3f4;
            --panel-bg: #f3f1f3;
            --panel-strong: #f0e9ef;
            --sidebar-panel: #efedf0;
            --sidebar-item: #e9e5e8;
            --sidebar-active: #d9b9ea;
            --field-bg: #f0eef0;
            --field-line: #d8d1d7;
            --primary: #d8b1ea;
            --primary-dark: #c28fe0;
            --primary-soft: #ebd7f4;
            --text: #2f2d30;
            --muted: #7b757c;
            --muted-strong: #5b565c;
            --heading: #2d2b2f;
            --success: #4c9d75;
            --danger: #d06a65;
            --shadow: 0 18px 34px rgba(59, 47, 82, 0.08);
            --border-soft: rgba(123, 117, 124, 0.18);
            --brand: #2d2d2d;
        }

        * { box-sizing: border-box; }

        html, body {
            margin: 0;
            min-height: 100%;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: var(--page-bg);
            color: var(--text);
        }

        body {
            min-height: 100vh;
        }

        button, input, select {
            font: inherit;
        }

        .app-shell {
            display: flex;
            min-height: 100vh;
            background: var(--page-bg);
        }

        .sidebar {
            width: 330px;
            background: rgba(248, 245, 247, 0.98);
            border-right: 1px solid var(--border-soft);
            padding: 28px 18px 24px;
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .brand-row {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 8px 12px 18px;
            border-bottom: 1px solid var(--border-soft);
        }

        .brand-mark {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            border: 2px solid rgba(52, 52, 52, 0.85);
            background: linear-gradient(135deg, #f7f2f7, #dfe6e0);
            position: relative;
            box-shadow: inset 0 0 0 2px rgba(255,255,255,0.6);
        }

        .brand-mark::before,
        .brand-mark::after {
            content: "";
            position: absolute;
            border-radius: 50%;
        }

        .brand-mark::before {
            inset: 8px;
            border: 2px solid rgba(51, 53, 55, 0.8);
            background: rgba(255,255,255,0.25);
        }

        .brand-mark::after {
            inset: 15px 10px 10px 15px;
            background: rgba(51, 53, 55, 0.7);
            transform: rotate(45deg);
        }

        .brand-copy {
            line-height: 1.05;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            font-weight: 700;
            color: var(--brand);
        }

        .brand-copy strong {
            display: block;
            font-size: 1.1rem;
            letter-spacing: 0.08em;
        }

        .brand-copy span {
            display: block;
            font-size: 0.72rem;
            letter-spacing: 0.18em;
            font-weight: 600;
        }

        .profile-box {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            padding: 6px 6px 12px 8px;
        }

        .profile-meta {
            display: flex;
            align-items: center;
            gap: 14px;
            min-width: 0;
        }

        .avatar {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            background: var(--sidebar-active);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            color: #2b2b2b;
            font-weight: 700;
            box-shadow: inset 0 0 0 2px rgba(255,255,255,0.66);
        }

        .profile-name {
            font-size: 1.05rem;
            font-weight: 700;
            line-height: 1.3;
            color: var(--heading);
        }

        .profile-role {
            display: block;
            font-size: 0.9rem;
            color: var(--muted-strong);
            font-weight: 500;
        }

        .profile-gear {
            font-size: 1.6rem;
            color: var(--muted);
            opacity: 0.8;
            margin-left: auto;
        }

        .sidebar-nav {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 4px;
        }

        .nav-item {
            width: 100%;
            display: flex;
            flex-direction: column;
            background: transparent;
            border: 0;
            padding: 0;
            text-align: left;
            color: inherit;
        }

        .nav-label {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 16px 14px 18px;
            border-radius: 10px;
            background: rgba(208, 205, 209, 0.35);
            color: var(--text);
            font-size: 1.05rem;
            font-weight: 600;
            margin-bottom: 2px;
            border: 1px solid transparent;
            transition: all 0.2s ease;
        }

        .nav-label:hover {
            background: rgba(200, 190, 203, 0.3);
        }

        .nav-item.active > .nav-label {
            background: linear-gradient(90deg, var(--sidebar-active), rgba(217,185,234,0.82));
            border-color: rgba(165, 116, 194, 0.18);
            box-shadow: inset 0 0 0 1px rgba(255,255,255,0.24);
        }

        .caret {
            font-size: 1.05rem;
            color: var(--muted-strong);
            line-height: 1;
        }

        .nav-submenu {
            display: none;
            flex-direction: column;
            gap: 6px;
            margin: 4px 6px 0 18px;
            padding-left: 8px;
            border-left: 1px solid rgba(117, 110, 125, 0.2);
        }

        .nav-item.open > .nav-submenu {
            display: flex;
        }

        .nav-subitem {
            display: block;
            padding: 10px 12px;
            border-radius: 8px;
            font-size: 0.98rem;
            color: var(--muted-strong);
            text-decoration: none;
            transition: background 0.2s ease;
        }

        .nav-subitem:hover,
        .nav-subitem.active {
            background: rgba(143, 118, 170, 0.08);
            color: var(--text);
        }

        .content {
            flex: 1;
            padding: 26px 36px 34px 32px;
        }

        .topbar {
            display: flex;
            align-items: center;
            gap: 18px;
            margin-bottom: 28px;
        }

        .searchbar {
            flex: 1;
            min-width: 0;
            display: flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(180deg, rgba(220, 199, 225, 0.85), rgba(217, 196, 226, 0.7));
            border: 1px solid rgba(165, 138, 182, 0.1);
            border-radius: 20px;
            padding: 16px 20px 15px 20px;
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.7);
        }

        .search-icon {
            width: 18px;
            height: 18px;
            border: 2px solid rgba(40,40,40,0.7);
            border-radius: 50%;
            position: relative;
            opacity: 0.9;
            flex-shrink: 0;
        }

        .search-icon::after {
            content: "";
            position: absolute;
            width: 9px;
            height: 2px;
            background: rgba(40,40,40,0.7);
            right: -5px;
            bottom: -1px;
            transform: rotate(45deg);
            border-radius: 2px;
        }

        .searchbar input {
            width: 100%;
            background: transparent;
            border: 0;
            outline: none;
            color: var(--muted-strong);
            font-size: 1.08rem;
            letter-spacing: 0.02em;
        }

        .searchbar input::placeholder {
            color: rgba(69, 62, 75, 0.72);
        }

        .user-panel {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 4px 8px 10px;
            white-space: nowrap;
        }

        .user-name {
            text-align: right;
            line-height: 1.2;
            color: var(--heading);
        }

        .user-name strong {
            display: block;
            font-size: 0.9rem;
            font-weight: 700;
        }

        .user-name small {
            display: block;
            color: var(--muted);
            font-size: 0.79rem;
        }

        .user-icon {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: rgba(119, 92, 131, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(119, 92, 131, 0.18);
            font-size: 0.9rem;
        }

        .page {
            display: flex;
            flex-direction: column;
            width: 100%;
            min-height: 620px;
        }

        .crumbs {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.9rem;
            color: var(--muted);
            margin: 4px 0 22px;
            flex-wrap: wrap;
        }

        .crumbs .sep {
            color: var(--muted);
            opacity: 0.7;
        }

        .page h1 {
            margin: 0;
            font-size: clamp(2.2rem, 2.4vw, 3.25rem);
            line-height: 1.08;
            font-weight: 700;
            letter-spacing: -0.04em;
            color: var(--heading);
        }

        .subtitle {
            margin: 22px 0 28px;
            font-size: clamp(1.1rem, 1.3vw, 1.7rem);
            line-height: 1.4;
            color: rgba(77, 69, 83, 0.75);
            font-weight: 400;
        }

        .generator-panel {
            width: min(100%, 1200px);
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(126, 118, 127, 0.15);
            border-radius: 10px;
            padding: 10px 0 0;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px 22px;
            margin-bottom: 12px;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 8px;
            min-width: 0;
        }

        .field.full {
            grid-column: 1 / -1;
        }

        .field-label {
            font-size: 1.02rem;
            color: var(--muted-strong);
            font-weight: 600;
            margin: 0;
        }

        .input-shell {
            width: 100%;
            position: relative;
        }

        .input-shell input,
        .input-shell select {
            width: 100%;
            height: 54px;
            padding: 14px 16px;
            border-radius: 6px;
            border: 1px solid var(--field-line);
            background: rgba(232, 230, 232, 0.5);
            color: var(--text);
            outline: none;
            font-size: 1.02rem;
            transition: border-color 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
        }

        .input-shell input::placeholder {
            color: rgba(72, 66, 76, 0.65);
        }

        .input-shell input:focus,
        .input-shell select:focus {
            border-color: rgba(150, 117, 172, 0.42);
            box-shadow: 0 0 0 4px rgba(214,188,229,0.18);
            background: rgba(241, 236, 242, 0.76);
        }

        .field-head {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 42px;
            border-radius: 6px 6px 0 0;
            background: linear-gradient(180deg, var(--primary), rgba(201, 168, 222, 0.94));
            border: 1px solid rgba(155, 118, 171, 0.18);
            color: rgba(54, 52, 59, 0.88);
            font-size: 1.02rem;
            font-weight: 700;
            letter-spacing: 0.01em;
            padding: 12px 18px;
        }

        .field-head + .input-shell input,
        .field-head + .input-shell select {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-top: 0;
        }

        .field-head + .input-shell input,
        .field-head + .input-shell select {
            background: rgba(225, 221, 227, 0.58);
        }

        .helper-row {
            font-size: 0.98rem;
            color: rgba(74, 68, 80, 0.7);
            margin: 10px 0 18px;
            min-height: 22px;
        }

        .action-row {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-top: 10px;
            margin-bottom: 14px;
        }

        .btn {
            appearance: none;
            border: 1px solid rgba(96, 87, 100, 0.4);
            border-radius: 6px;
            background: rgba(255,255,255,0.1);
            color: var(--text);
            font-size: 1.05rem;
            font-weight: 600;
            min-width: 162px;
            height: 52px;
            padding: 0 28px;
            cursor: pointer;
            transition: transform 0.15s ease, box-shadow 0.15s ease, border-color 0.2s ease;
        }

        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 18px rgba(56, 48, 68, 0.08);
        }

        .btn.primary {
            border-color: rgba(152, 118, 174, 0.18);
            background: linear-gradient(180deg, rgba(221, 197, 231, 0.76), rgba(206, 176, 222, 0.78));
            color: rgba(41, 38, 43, 0.9);
        }

        .btn.secondary {
            background: rgba(238, 235, 238, 0.45);
        }

        .preview-box {
            width: min(100%, 1200px);
            min-height: 260px;
            background: rgba(240, 237, 240, 0.78);
            border: 1px solid rgba(126, 118, 127, 0.12);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 20px;
            margin-top: 6px;
            position: relative;
        }

        .preview-inner {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 12px;
            text-align: center;
            color: rgba(95, 87, 101, 0.76);
        }

        .placeholder-icon {
            width: 54px;
            height: 54px;
            border: 2px solid rgba(100, 97, 103, 0.55);
            border-radius: 10px;
            position: relative;
            background: rgba(255,255,255,0.14);
        }

        .placeholder-icon::before {
            content: "";
            position: absolute;
            inset: 15px 12px 12px 12px;
            border: 2px solid rgba(100, 97, 103, 0.75);
            border-radius: 7px;
            background: rgba(255,255,255,0.12);
        }

        .placeholder-icon::after {
            content: "";
            position: absolute;
            width: 18px;
            height: 18px;
            border: 2px solid rgba(100, 97, 103, 0.75);
            border-radius: 50%;
            background: rgba(255,255,255,0.12);
            right: 11px;
            top: 9px;
        }

        .preview-message {
            font-size: 0.98rem;
            color: rgba(98, 89, 103, 0.68);
        }

        .status-message {
            min-height: 22px;
            margin-top: 8px;
            font-size: 0.96rem;
            font-weight: 600;
            color: var(--success);
        }

        .status-message.error {
            color: var(--danger);
        }

        @media (max-width: 980px) {
            .app-shell {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                border-right: 0;
                border-bottom: 1px solid var(--border-soft);
            }

            .content {
                padding: 20px 20px 28px;
            }

            .topbar {
                flex-wrap: wrap;
            }
        }

        @media (max-width: 720px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .action-row {
                flex-direction: column;
                align-items: stretch;
            }

            .btn {
                width: 100%;
            }

            .searchbar {
                min-width: 100%;
            }

            .user-panel {
                width: 100%;
                justify-content: flex-end;
            }
        }
    </style>
</head>
<body>
    <div class="app-shell">
        <aside class="sidebar" aria-label="Sidebar navigation">
            <div class="brand-row">
                <div class="brand-mark" aria-hidden="true"></div>
                <div class="brand-copy">
                    <strong>Covenant</strong>
                    <span>University</span>
                </div>
            </div>

            <div class="profile-box">
                <div class="profile-meta">
                    <div class="avatar" aria-label="User avatar">MO</div>
                    <div>
                        <div class="profile-name"><?php echo htmlspecialchars($currentUser['name']); ?></div>
                        <span class="profile-role">My Profile</span>
                    </div>
                </div>
                <div class="profile-gear" aria-hidden="true">⚙</div>
            </div>

            <nav class="sidebar-nav" aria-label="Main navigation">
                <?php foreach ($menuGroups as $group): ?>
                    <div class="nav-item <?php echo !empty($group['expanded']) ? 'open' : ''; ?> <?php echo !empty($group['active']) ? 'active' : ''; ?>">
                        <div class="nav-label" tabindex="0" aria-label="<?php echo htmlspecialchars($group['label']); ?>">
                            <span><?php echo htmlspecialchars($group['label']); ?></span>
                            <span class="caret">▾</span>
                        </div>

                        <?php if (!empty($group['items'])): ?>
                            <div class="nav-submenu">
                                <?php foreach ($group['items'] as $item): ?>
                                    <a class="nav-subitem <?php echo !empty($item['active']) ? 'active' : ''; ?>" href="#"><?php echo htmlspecialchars($item['label']); ?></a>
                                    <?php if (!empty($item['children'])): ?>
                                        <?php foreach ($item['children'] as $child): ?>
                                            <a class="nav-subitem <?php echo !empty($child['active']) ? 'active' : ''; ?>" href="#"><?php echo htmlspecialchars($child['label']); ?></a>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </nav>
        </aside>

        <main class="content">
            <header class="topbar" aria-label="Primary header">
                <div class="searchbar" role="search">
                    <span class="search-icon" aria-hidden="true"></span>
                    <input type="search" value="" placeholder="Search biometrics, academic planning, reports..." aria-label="Search biometrics, academic planning, reports" />
                </div>

                <div class="user-panel" aria-label="User profile">
                    <div class="user-name">
                        <strong><?php echo htmlspecialchars($currentUser['name']); ?></strong>
                        <small><?php echo htmlspecialchars($currentUser['role']); ?></small>
                    </div>
                    <div class="user-icon" aria-hidden="true">◉</div>
                </div>
            </header>

            <section class="page" aria-labelledby="page-title">
                <div class="crumbs" aria-label="Breadcrumb">
                    <span>Home</span>
                    <span class="sep">›</span>
                    <span>Biometric</span>
                    <span class="sep">›</span>
                    <span>Temporary ID Card Generator</span>
                </div>

                <h1 id="page-title">Permanent ID Card Generator</h1>
                <p class="subtitle">Filter and generate a student's temporary ID card</p>

                <form id="idCardForm" class="generator-panel" method="post" novalidate>
                    <div class="form-grid">
                        <div class="field full">
                            <div class="field-head">College and level</div>
                            <div class="input-shell">
                                <select name="college_level" id="college_level" required>
                                    <option value="">Select college and level</option>
                                    <option value="College of Engineering">College of Engineering</option>
                                    <option value="College of Science and Technology">College of Science and Technology</option>
                                    <option value="College of Management and Social Sciences">College of Management and Social Sciences</option>
                                    <option value="College of Leadership and Development Studies">College of Leadership and Development Studies</option>
                                </select>
                            </div>
                        </div>

                        <div class="field">
                            <label class="field-label" for="first_name">First Name</label>
                            <div class="input-shell">
                                <input type="text" id="first_name" name="first_name" placeholder="Type first name..." />
                            </div>
                        </div>

                        <div class="field">
                            <label class="field-label" for="last_name">Last Name</label>
                            <div class="input-shell">
                                <input type="text" id="last_name" name="last_name" placeholder="Type last name..." />
                            </div>
                        </div>
                    </div>

                    <div class="helper-row" id="helperRow">Fill both fields to enable card generation</div>
                    <div class="status-message" id="statusMessage" aria-live="polite"></div>

                    <div class="action-row">
                        <button type="submit" class="btn primary" id="generateBtn">Generate Cards</button>
                        <button type="reset" class="btn secondary" id="resetBtn">Reset</button>
                    </div>
                </form>

                <div class="preview-box" aria-live="polite">
                    <div class="preview-inner" id="previewState">
                        <div class="placeholder-icon" aria-hidden="true"></div>
                        <div class="preview-message">Select college and level to preview ID cards</div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script>
        (function () {
            const form = document.getElementById('idCardForm');
            const collegeSelect = document.getElementById('college_level');
            const firstName = document.getElementById('first_name');
            const lastName = document.getElementById('last_name');
            const statusMessage = document.getElementById('statusMessage');
            const helperRow = document.getElementById('helperRow');
            const previewState = document.getElementById('previewState');
            const generateBtn = document.getElementById('generateBtn');

            function updateGenerationReadyState() {
                const eligible = firstName.value.trim() && lastName.value.trim() && collegeSelect.value.trim();
                generateBtn.disabled = !eligible;
                generateBtn.style.opacity = eligible ? '1' : '0.72';
                generateBtn.style.cursor = eligible ? 'pointer' : 'not-allowed';

                if (firstName.value.trim() && lastName.value.trim()) {
                    helperRow.textContent = 'Ready to generate ID cards';
                    helperRow.style.color = 'rgba(51, 141, 99, 0.9)';
                } else {
                    helperRow.textContent = 'Fill both fields to enable card generation';
                    helperRow.style.color = 'rgba(74, 68, 80, 0.7)';
                }
            }

            [collegeSelect, firstName, lastName].forEach(function (element) {
                element.addEventListener('input', updateGenerationReadyState);
                element.addEventListener('change', updateGenerationReadyState);
            });

            form.addEventListener('reset', function () {
                window.setTimeout(function () {
                    statusMessage.textContent = '';
                    statusMessage.classList.remove('error');
                    previewState.innerHTML = '<div class="placeholder-icon" aria-hidden="true"></div><div class="preview-message">Select college and level to preview ID cards</div>';
                    helperRow.textContent = 'Fill both fields to enable card generation';
                    helperRow.style.color = 'rgba(74, 68, 80, 0.7)';
                    generateBtn.disabled = true;
                    generateBtn.style.opacity = '0.72';
                    generateBtn.style.cursor = 'not-allowed';
                }, 0);
            });

            form.addEventListener('submit', function (event) {
                event.preventDefault();

                const college = collegeSelect.value.trim();
                const first = firstName.value.trim();
                const last = lastName.value.trim();

                if (!college || !first || !last) {
                    statusMessage.textContent = 'Please select a college and enter both names before generating cards.';
                    statusMessage.classList.add('error');
                    return;
                }

                statusMessage.classList.remove('error');
                statusMessage.textContent = 'Card generation started for ' + first + ' ' + last + ' from ' + college + '.';

                previewState.innerHTML = [
                    '<div style="display:flex; flex-direction:column; align-items:center; gap:14px; width:min(100%, 520px);">',
                    '<div style="display:flex; align-items:center; justify-content:center; width:100%; gap:14px; flex-wrap:wrap;">',
                    '<div style="width:220px; height:130px; border-radius:12px; background:linear-gradient(135deg,#ffffff,#f0ebf1); border:1px solid rgba(92,84,99,0.18); box-shadow:0 12px 28px rgba(40,32,48,0.08); display:flex; align-items:center; justify-content:center; flex-direction:column; color:#453f49; font-weight:700; text-transform:uppercase; letter-spacing:0.06em;">',
                    '<span style="font-size:0.8rem; opacity:0.7;">Covenant</span>',
                    '<span style="font-size:1.1rem;">University</span>',
                    '</div>',
                    '<div style="width:220px; height:130px; border-radius:12px; background:linear-gradient(135deg,#f6eaf9,#e5d1ee); border:1px solid rgba(92,84,99,0.18); box-shadow:0 12px 28px rgba(40,32,48,0.08); display:flex; align-items:center; justify-content:center; flex-direction:column; gap:6px; color:#2a2a2d;">',
                    '<span style="font-size:0.78rem; text-transform:uppercase; letter-spacing:0.12em; opacity:0.8;">Student</span>',
                    '<span style="font-size:1.4rem; font-weight:700;">' + escapeHtml(first) + ' ' + escapeHtml(last) + '</span>',
                    '<span style="font-size:0.88rem; text-transform:uppercase; letter-spacing:0.08em; opacity:0.8;">' + escapeHtml(college) + '</span>',
                    '</div>',
                    '</div>',
                    '<div style="font-size:0.9rem; color:rgba(62,56,68,0.76); margin-top:10px;">Temporary preview ready for approval</div>',
                    '</div>'
                ].join('');
            });

            function escapeHtml(value) {
                return String(value)
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/"/g, '&quot;')
                    .replace(/'/g, '&#039;');
            }

            generateBtn.disabled = true;
            generateBtn.style.opacity = '0.72';
            generateBtn.style.cursor = 'not-allowed';
            helperRow.textContent = 'Fill both fields to enable card generation';
        })();
    </script>
</body>
</html>
