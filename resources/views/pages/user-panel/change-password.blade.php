@extends('layouts.user-panel')
@section('title', 'Change Password — NutriBuddy Kids')

@push('styles')
    <style>
        :root {
            --pk: #FF4D8F;
            --pkl: #FFD6E8;
            --pkd: #C0306F;
            --pu: #7C3AED;
            --pul: #EDE9FE;
            --pud: #5B21B6;
            --ye: #FFD600;
            --yel: #FFFBE0;
            --sk: #00BFFF;
            --skl: #DCFBFF;
            --mn: #00D68F;
            --mnl: #D0FFF2;
            --or: #FF6B35;
            --orl: #FFE8DF;
            --dk: #0D0020;
            --wh: #FFFFFF;
            --cr: #FFFBF5;
            --border: #E6E6EE;
            --muted: #6b6b80;
            --sidebar-w: 270px;
        }

        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box
        }

        html {
            scroll-behavior: smooth
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--wh);
            color: var(--dk);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        /* ═══ SIDEBAR ═══ */
        .sidebar {
            width: var(--sidebar-w);
            margin-top: 83px;
            min-height: 100vh;
            background: var(--wh);
            border-right: 2px solid var(--border);
            display: flex;
            flex-direction: column;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 100;
            transition: transform .35s cubic-bezier(.34, 1.56, .64, 1);
        }

        .sidebar-logo {
            padding: 26px 22px 18px;
            border-bottom: 2px solid var(--border);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            border-radius: 13px;
            background: linear-gradient(135deg, var(--pk), var(--pkd));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            box-shadow: 0 6px 18px rgba(255, 77, 143, .3);
        }

        .logo-text {
            font-family: 'Fredoka One', cursive;
            font-size: 1.12rem;
            color: var(--dk);
            line-height: 1.1;
        }

        .logo-text span {
            color: var(--pk)
        }

        .logo-sub {
            font-family: 'Plus Jakarta Sans';
            font-size: .62rem;
            font-weight: 600;
            color: var(--muted)
        }

        .profile-block {
            padding: 22px 18px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            border-bottom: 2px solid var(--border);
        }

        .avatar {
            width: 68px;
            height: 68px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--pk), var(--pu));
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Fredoka One', cursive;
            font-size: 1.9rem;
            color: #fff;
            box-shadow: 0 8px 22px rgba(255, 77, 143, .28);
            position: relative;
        }

        .online-dot {
            position: absolute;
            bottom: 3px;
            right: 3px;
            width: 13px;
            height: 13px;
            border-radius: 50%;
            background: var(--mn);
            border: 2.5px solid #fff;
        }

        .profile-name {
            font-family: 'Nunito', sans-serif;
            font-weight: 900;
            font-size: .95rem;
            color: var(--dk)
        }

        .profile-email {
            font-size: .75rem;
            color: var(--muted)
        }

        .nav-section {
            padding: 18px 14px 4px
        }

        .nav-label {
            font-family: 'Nunito', sans-serif;
            font-weight: 900;
            font-size: .62rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--muted);
            padding: 0 8px;
            margin-bottom: 6px;
            display: block;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 10px 13px;
            border-radius: 13px;
            font-size: .86rem;
            font-weight: 600;
            color: var(--muted);
            cursor: pointer;
            transition: .2s;
            text-decoration: none;
            margin-bottom: 1px;
            position: relative;
        }

        .nav-item:hover {
            background: var(--cr);
            color: var(--dk)
        }

        .nav-item.active {
            background: var(--pkl);
            color: var(--pk);
            font-weight: 800;
        }

        .nav-item.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 3px;
            height: 58%;
            background: var(--pk);
            border-radius: 0 4px 4px 0;
        }

        .nav-item svg {
            width: 17px;
            height: 17px;
            flex-shrink: 0
        }

        .nbadge {
            margin-left: auto;
            background: var(--pk);
            color: #fff;
            border-radius: 50px;
            padding: 2px 8px;
            font-size: .66rem;
            font-weight: 900;
        }

        .sidebar-footer {
            margin-top: auto;
            padding: 14px;
            border-top: 2px solid var(--border);
        }

        .logout-btn {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 10px 13px;
            border-radius: 13px;
            font-size: .86rem;
            font-weight: 700;
            color: #ef4444;
            cursor: pointer;
            transition: .2s;
            width: 100%;
            background: none;
            border: none;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .logout-btn:hover {
            background: #fff0f0
        }

        /* ═══ MAIN ═══ */
        .main {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
        }


        .hamburger {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            padding: 8px;
            border-radius: 10px;
            color: var(--dk);
            transition: .2s;
        }

        .hamburger:hover {
            background: var(--cr)
        }


        .icon-btn {
            width: 38px;
            height: 38px;
            border-radius: 11px;
            background: var(--cr);
            border: 2px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: .2s;
            position: relative;
        }

        .icon-btn:hover {
            background: var(--pkl);
            border-color: var(--pk)
        }

        .notif-dot {
            position: absolute;
            top: 6px;
            right: 6px;
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--pk);
            border: 2px solid #fff;
        }

        /* ═══ PAGE ═══ */
        .page {
            padding: 28px 30px;
            flex: 1
        }

        .page-header {
            margin-bottom: 24px;
        }

        .page-header h1 {
            margin-top: 63px;
            font-family: 'Fredoka One', cursive;
            font-size: 1.8rem;
            color: var(--dk);
            margin-bottom: 3px;
        }

        .page-header p {
            font-size: .84rem;
            color: var(--muted)
        }

        /* ═══ CHANGE PASSWORD CARD ═══ */
        .cp-card {
            margin-top: 27px;
            margin-bottom: 112px;
            background: var(--wh);
            border: 2px solid var(--border);
            border-radius: 22px;
            padding: 32px;
            max-width: 680px;
            animation: fadeUp .45s cubic-bezier(.34, 1.1, .64, 1) forwards;
            opacity: 0;
        }

        @keyframes fadeUp {
            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        .cp-card-title {
            font-family: 'Nunito', sans-serif;
            font-weight: 900;
            font-size: 1rem;
            color: var(--dk);
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .cp-card-title .title-icon {
            width: 34px;
            height: 34px;
            border-radius: 10px;
            background: var(--pkl);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .95rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
            margin-bottom: 16px
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
            margin-bottom: 16px
        }

        .form-label {
            font-size: .76rem;
            font-weight: 700;
            color: var(--muted);
            letter-spacing: .5px;
            text-transform: uppercase
        }

        .input-wrap {
            position: relative
        }

        .form-input {
            width: 100%;
            padding: 12px 44px 12px 14px;
            border: 2px solid var(--border);
            border-radius: 12px;
            font-size: .88rem;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--dk);
            transition: .2s;
            background: var(--cr);
            outline: none;
        }

        .form-input:focus {
            border-color: var(--pk);
            background: var(--wh);
            box-shadow: 0 0 0 4px rgba(255, 77, 143, .08)
        }

        .form-input::placeholder {
            color: var(--muted)
        }

        .toggle-eye {
            position: absolute;
            right: 13px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: var(--muted);
            display: flex;
            align-items: center;
            padding: 2px;
            transition: .2s;
        }

        .toggle-eye:hover {
            color: var(--pk)
        }

        /* strength bar */
        .strength-wrap {
            margin-top: 8px
        }

        .strength-bar {
            display: flex;
            gap: 4px;
            margin-bottom: 5px;
        }

        .strength-seg {
            height: 4px;
            border-radius: 4px;
            flex: 1;
            background: var(--border);
            transition: .35s;
        }

        .strength-label {
            font-size: .7rem;
            font-weight: 700;
            color: var(--muted)
        }

        /* hint list */
        .hints {
            display: flex;
            flex-direction: column;
            gap: 5px;
            margin-top: 10px
        }

        .hint {
            display: flex;
            align-items: center;
            gap: 7px;
            font-size: .75rem;
            color: var(--muted);
            transition: .25s
        }

        .hint.ok {
            color: #059669
        }

        .hint .dot {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            border: 2px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .55rem;
            flex-shrink: 0;
            transition: .25s;
        }

        .hint.ok .dot {
            background: var(--mn);
            border-color: var(--mn);
            color: #fff
        }

        .divider {
            height: 2px;
            background: var(--border);
            border-radius: 2px;
            margin: 20px 0
        }

        .form-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 10px;
            flex-wrap: wrap
        }

        .btn-cancel {
            padding: 11px 24px;
            border-radius: 12px;
            border: 2px solid var(--border);
            background: var(--wh);
            font-family: 'Plus Jakarta Sans';
            font-weight: 700;
            font-size: .86rem;
            cursor: pointer;
            color: var(--dk);
            transition: .2s;
        }

        .btn-cancel:hover {
            background: var(--cr)
        }

        .btn-save {
            padding: 11px 26px;
            border-radius: 12px;
            border: none;
            background: linear-gradient(135deg, var(--pk), var(--pkd));
            font-family: 'Plus Jakarta Sans';
            font-weight: 700;
            font-size: .86rem;
            cursor: pointer;
            color: #fff;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: .3s;
            box-shadow: 0 8px 22px rgba(255, 77, 143, .3);
        }

        .btn-save:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 30px rgba(255, 77, 143, .45)
        }

        /* toast */
        .toast {
            position: fixed;
            bottom: 28px;
            right: 28px;
            background: var(--dk);
            color: #fff;
            padding: 14px 22px;
            border-radius: 14px;
            font-size: .84rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 12px 32px rgba(0, 0, 0, .2);
            transform: translateY(80px);
            opacity: 0;
            transition: .4s cubic-bezier(.34, 1.56, .64, 1);
            z-index: 300;
        }

        .toast.show {
            transform: translateY(0);
            opacity: 1
        }

        .toast .t-icon {
            width: 26px;
            height: 26px;
            border-radius: 8px;
            background: var(--mn);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        /* overlay + sidebar */
        .overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(13, 0, 32, .4);
            z-index: 90;
            backdrop-filter: blur(4px);
        }

        .overlay.show {
            display: block
        }

        /* ═══ RESPONSIVE ═══ */
        @media(max-width:900px) {
            .ud-sidebar {
                transform: translateX(100%)
            }

            .ud-sidebar.open {
                transform: translateX(0)
            }

            .main {
                margin-right: 0
            }

            .hamburger {
                display: flex
            }
        }

        @media(max-width:640px) {
            .page {
                padding: 16px
            }

            .form-row {
                grid-template-columns: 1fr
            }

            .cp-card {
                padding: 20px
            }

            .form-actions {
                justify-content: stretch
            }

            .btn-cancel,
            .btn-save {
                flex: 1;
                justify-content: center
            }
        }
    </style>
@endpush

@section('panel-content')
    <div class="inner-topbar">
        <button class="sidebar-toggle" onclick="toggleSidebar()">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                <line x1="3" y1="6" x2="21" y2="6" />
                <line x1="3" y1="12" x2="21" y2="12" />
                <line x1="3" y1="18" x2="21" y2="18" />
            </svg>
        </button>
        <span class="it-title">Change Password 🔒</span>
        <div style="width:36px"></div>
    </div>
        <div class="main">


            <div class="page">

                <div class="page-header fade-in d1">
                    <div class="page-header-left">
                        <h1>Change Password </h1>
                        <p>Manage your profile details and account settings</p>
                    </div>
                </div>

                <div class="welcome-banner d1">
                    <div class="welcome-text" style="position:relative;z-index:1">
                        <h2>Welcome back, <span>Jaydafsdf!</span> 👋</h2>
                        <p>Keep your account safe with a strong password and two-step protection.</p>
                    </div>
                    <div class="welcome-right">
                        <div class="banner-stat">
                            <div class="bs-num">100%</div>
                            <div class="bs-lbl">Secure</div>
                        </div>
                        <div class="banner-stat">
                            <div class="bs-num">1</div>
                            <div class="bs-lbl">Password</div>
                        </div>
                        <div class="banner-emoji">🔒</div>
                    </div>
                </div>

                <div class="cp-card">
                    <div class="cp-card-title">
                        <div class="title-icon">🔒</div>
                        Update Your Password
                    </div>

                    <!-- Current Password -->
                    <div class="form-group">
                        <label class="form-label">Current Password</label>
                        <div class="input-wrap">
                            <input type="password" class="form-input" id="currentPwd"
                                placeholder="Enter current password">
                            <button class="toggle-eye" onclick="toggleVis('currentPwd',this)" type="button">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2.2">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="divider"></div>

                    <!-- New + Confirm -->
                    <div class="form-row">
                        <div class="form-group" style="margin-bottom:0">
                            <label class="form-label">New Password</label>
                            <div class="input-wrap">
                                <input type="password" class="form-input" id="newPwd"
                                    placeholder="Enter new password" oninput="checkStrength(this.value)">
                                <button class="toggle-eye" onclick="toggleVis('newPwd',this)" type="button">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2.2">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                        <circle cx="12" cy="12" r="3" />
                                    </svg>
                                </button>
                            </div>
                            <!-- strength -->
                            <div class="strength-wrap">
                                <div class="strength-bar">
                                    <div class="strength-seg" id="s1"></div>
                                    <div class="strength-seg" id="s2"></div>
                                    <div class="strength-seg" id="s3"></div>
                                    <div class="strength-seg" id="s4"></div>
                                </div>
                                <div class="strength-label" id="strengthLabel">Enter a password</div>
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom:0">
                            <label class="form-label">Confirm Password</label>
                            <div class="input-wrap">
                                <input type="password" class="form-input" id="confirmPwd"
                                    placeholder="Confirm new password" oninput="checkMatch()">
                                <button class="toggle-eye" onclick="toggleVis('confirmPwd',this)" type="button">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2.2">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                        <circle cx="12" cy="12" r="3" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- hints -->
                    <div class="hints" style="margin-top:14px">
                        <div class="hint" id="h-len">
                            <div class="dot">✓</div> At least 8 characters
                        </div>
                        <div class="hint" id="h-up">
                            <div class="dot">✓</div> One uppercase letter
                        </div>
                        <div class="hint" id="h-num">
                            <div class="dot">✓</div> One number
                        </div>
                        <div class="hint" id="h-match">
                            <div class="dot">✓</div> Passwords match
                        </div>
                    </div>

                    <div class="divider"></div>

                    <div class="form-actions">
                        <button class="btn-cancel">Cancel</button>
                        <button class="btn-save" onclick="handleSave()">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5">
                                <polyline points="20 6 9 17 4 12" />
                            </svg>
                            Update Password
                        </button>
                    </div>
                </div>

            </div>

    <!-- Toast -->
    <div class="toast" id="toast">
        <div class="t-icon">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3">
                <polyline points="20 6 9 17 4 12" />
            </svg>
        </div>
        Password updated successfully!
    </div>

    @push('scripts')
        <script>
            /* Sidebar */
            function toggleSidebar() {
                document.getElementById('sidebar').classList.toggle('open');
                document.getElementById('overlay').classList.toggle('show');
            }

            function closeSidebar() {
                document.getElementById('sidebar').classList.remove('open');
                document.getElementById('overlay').classList.remove('show');
            }

            function setActive(el) {
                document.querySelectorAll('.nav-item').forEach(i => i.classList.remove('active'));
                el.classList.add('active');
            }

            /* Eye toggle */
            function toggleVis(id, btn) {
                const inp = document.getElementById(id);
                const show = inp.type === 'password';
                inp.type = show ? 'text' : 'password';
                btn.innerHTML = show ?
                    `<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/><path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/><line x1="1" y1="1" x2="23" y2="23"/></svg>` :
                    `<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>`;
            }

            /* Strength */
            const colors = ['#ef4444', '#f97316', '#eab308', '#22c55e'];
            const labels = ['Weak', 'Fair', 'Good', 'Strong'];

            function checkStrength(v) {
                let s = 0;
                if (v.length >= 8) s++;
                if (/[A-Z]/.test(v)) s++;
                if (/[0-9]/.test(v)) s++;
                if (/[^A-Za-z0-9]/.test(v)) s++;
                for (let i = 1; i <= 4; i++) {
                    const seg = document.getElementById('s' + i);
                    seg.style.background = i <= s ? colors[s - 1] : 'var(--border)';
                }
                document.getElementById('strengthLabel').textContent = v ? labels[Math.min(s, 4) - 1] || 'Too short' :
                    'Enter a password';
                document.getElementById('strengthLabel').style.color = v ? colors[Math.min(s, 4) - 1] : 'var(--muted)';
                updateHints(v);
            }

            function updateHints(v) {
                toggle('h-len', v.length >= 8);
                toggle('h-up', /[A-Z]/.test(v));
                toggle('h-num', /[0-9]/.test(v));
                checkMatch();
            }

            function checkMatch() {
                const n = document.getElementById('newPwd').value;
                const c = document.getElementById('confirmPwd').value;
                toggle('h-match', c && n === c);
            }

            function toggle(id, ok) {
                document.getElementById(id).classList.toggle('ok', ok);
            }

            /* Save */
            function handleSave() {
                const cur = document.getElementById('currentPwd').value;
                const n = document.getElementById('newPwd').value;
                const c = document.getElementById('confirmPwd').value;
                if (!cur || !n || !c) {
                    alert('Please fill all fields.');
                    return;
                }
                if (n !== c) {
                    alert('Passwords do not match.');
                    return;
                }
                if (n.length < 8) {
                    alert('Password must be at least 8 characters.');
                    return;
                }
                const t = document.getElementById('toast');
                t.classList.add('show');
                setTimeout(() => t.classList.remove('show'), 3000);
                document.getElementById('currentPwd').value = '';
                document.getElementById('newPwd').value = '';
                document.getElementById('confirmPwd').value = '';
                checkStrength('');
                ['h-len', 'h-up', 'h-num', 'h-match'].forEach(id => document.getElementById(id).classList.remove('ok'));
            }
        </script>
    @endpush
@endsection
