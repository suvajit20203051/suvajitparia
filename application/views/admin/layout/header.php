<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title><?= isset($title) ? htmlspecialchars($title).' – Admin' : 'Admin Panel' ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
  <style>
    :root{--sidebar-w:240px;--primary:#6c63ff;--dark:#0d0d1a;--card:#13132a;}
    body{background:#f0f2f5;font-family:'Segoe UI',sans-serif;}
    /* Sidebar */
    #sidebar{width:var(--sidebar-w);min-height:100vh;background:var(--dark);position:fixed;top:0;left:0;z-index:1000;transition:.3s;}
    #sidebar .brand{padding:20px 18px;border-bottom:1px solid rgba(255,255,255,.08);font-size:1.2rem;font-weight:700;color:#fff;font-family:monospace;}
    #sidebar .brand span{color:var(--primary);}
    #sidebar .nav-link{color:rgba(255,255,255,.7);padding:10px 18px;border-radius:8px;margin:2px 8px;font-size:.88rem;transition:.2s;}
    #sidebar .nav-link:hover,#sidebar .nav-link.active{background:var(--primary);color:#fff;}
    #sidebar .nav-link i{width:20px;margin-right:8px;}
    #sidebar .nav-section{font-size:.7rem;color:rgba(255,255,255,.35);text-transform:uppercase;letter-spacing:1.5px;padding:14px 18px 4px;}
    /* Main */
    #main{margin-left:var(--sidebar-w);min-height:100vh;}
    /* Topbar */
    #topbar{background:#fff;padding:12px 24px;border-bottom:1px solid #e0e0e0;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;z-index:999;}
    #topbar .page-title{font-weight:600;font-size:1.1rem;color:#333;margin:0;}
    /* Cards */
    .stat-card{background:#fff;border-radius:12px;padding:20px;border:1px solid #e8e8e8;transition:.2s;}
    .stat-card:hover{box-shadow:0 4px 20px rgba(108,99,255,.12);border-color:var(--primary);}
    .stat-icon{width:52px;height:52px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.3rem;}
    /* Table */
    .table th{font-size:.8rem;text-transform:uppercase;letter-spacing:.5px;color:#888;font-weight:600;}
    .badge-work{background:rgba(108,99,255,.15);color:#6c63ff;}
    .badge-training{background:rgba(253,121,168,.15);color:#fd79a8;}
    /* Form card */
    .form-card{background:#fff;border-radius:12px;padding:28px;border:1px solid #e8e8e8;}
    .form-label{font-weight:500;font-size:.88rem;color:#555;}
    /* Responsive */
    @media(max-width:768px){#sidebar{left:calc(-1 * var(--sidebar-w));}#sidebar.open{left:0;}#main{margin-left:0;}}
  </style>
</head>
<body>
