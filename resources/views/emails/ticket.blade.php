<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="id">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>E-Ticket Resmi - Amikom Event Hub</title>
    <style type="text/css">
        /* Client-specific Styles */
        body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
        img { -ms-interpolation-mode: bicubic; }

        /* Reset Styles */
        img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
        table { border-collapse: collapse !important; }
        body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }

        /* Custom Styles */
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Space+Mono:wght@700&display=swap');
        
        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background-color: #090d16;
        }
    </style>
</head>
<body style="margin: 0; padding: 0; background-color: #090d16;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #090d16;">
        <tr>
            <td align="center" style="padding: 40px 20px;">
                <!-- Main Container -->
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 480px;">
                    
                    <!-- Brand Header -->
                    <tr>
                        <td align="center" style="padding-bottom: 24px;">
                            <span style="font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: 3px; color: #6366f1;">Amikom Event Hub</span>
                            <h1 style="margin: 4px 0 0 0; font-size: 22px; font-weight: 800; color: #ffffff; letter-spacing: -0.5px;">E-Ticket Pembelian</h1>
                        </td>
                    </tr>

                    <!-- Ticket Card -->
                    <tr>
                        <td style="background-color: #ffffff; border-radius: 24px; box-shadow: 0 20px 40px rgba(0,0,0,0.3); overflow: hidden;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                
                                <!-- Ticket Top: VIP Accent and Event Title -->
                                <tr>
                                    <td style="padding: 28px 24px; background-color: #f8fafc; border-bottom: 2px dashed #e2e8f0;">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td style="padding-bottom: 12px;">
                                                    <span style="display: inline-block; padding: 4px 10px; background-color: #e0e7ff; color: #4f46e5; border-radius: 6px; font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 1px;">Tiket Terkonfirmasi</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2 style="margin: 0; font-size: 20px; font-weight: 800; color: #0f172a; line-height: 1.3;">{{ $transaction->event->title ?? 'Amikom Event' }}</h2>
                                                    <p style="margin: 6px 0 0 0; font-size: 13px; color: #6366f1; font-weight: 700;">{{ $transaction->event ? \Carbon\Carbon::parse($transaction->event->date)->format('d F Y, H:i') : '-' }} WIB</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <!-- Ticket Details (2x2 Grid using table columns) -->
                                <tr>
                                    <td style="padding: 28px 24px 20px 24px;">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <!-- Row 1 -->
                                            <tr>
                                                <td width="50%" valign="top" style="padding-bottom: 20px; padding-right: 10px;">
                                                    <span style="display: block; font-size: 10px; font-weight: 700; text-transform: uppercase; color: #94a3b8; letter-spacing: 1px; margin-bottom: 4px;">Nama Pembeli</span>
                                                    <span style="font-size: 14px; font-weight: 700; color: #1e293b; word-break: break-word;">{{ $transaction->customer_name }}</span>
                                                </td>
                                                <td width="50%" valign="top" style="padding-bottom: 20px; padding-left: 10px;">
                                                    <span style="display: block; font-size: 10px; font-weight: 700; text-transform: uppercase; color: #94a3b8; letter-spacing: 1px; margin-bottom: 4px;">Metode Bayar</span>
                                                    <span style="font-size: 14px; font-weight: 700; color: #1e293b; text-transform: uppercase;">{{ $transaction->payment_type ?? 'Online' }}</span>
                                                </td>
                                            </tr>
                                            <!-- Row 2 -->
                                            <tr>
                                                <td width="50%" valign="top" style="padding-bottom: 20px; padding-right: 10px;">
                                                    <span style="display: block; font-size: 10px; font-weight: 700; text-transform: uppercase; color: #94a3b8; letter-spacing: 1px; margin-bottom: 4px;">Order ID</span>
                                                    <span style="font-size: 13px; font-family: monospace; font-weight: 700; color: #64748b;">{{ $transaction->order_id }}</span>
                                                </td>
                                                <td width="50%" valign="top" style="padding-bottom: 20px; padding-left: 10px;">
                                                    <span style="display: block; font-size: 10px; font-weight: 700; text-transform: uppercase; color: #94a3b8; letter-spacing: 1px; margin-bottom: 4px;">Lokasi</span>
                                                    <span style="font-size: 13px; font-weight: 600; color: #1e293b; line-height: 1.3;">{{ $transaction->event->location ?? '-' }}</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <!-- QR Section -->
                                <tr>
                                    <td align="center" style="padding: 0 24px 32px 24px;">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f8fafc; border-radius: 16px; border: 1px solid #e2e8f0;">
                                            <tr>
                                                <td align="center" style="padding: 24px;">
                                                    <span style="display: block; font-size: 10px; font-weight: 700; text-transform: uppercase; color: #94a3b8; letter-spacing: 1px; margin-bottom: 12px;">Pindai Saat Memasuki Venue</span>
                                                    
                                                    <!-- QR Container -->
                                                    <table border="0" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);">
                                                        <tr>
                                                            <td style="padding: 12px;">
                                                                <img src="https://api.qrserver.com/v1/create-qr-code/?size=140x140&data={{ urlencode($transaction->ticket_code) }}" alt="QR Code" width="140" height="140" style="display: block;" />
                                                            </td>
                                                        </tr>
                                                    </table>

                                                    <!-- Ticket Code -->
                                                    <p style="margin: 16px 0 0 0; font-family: 'Space Mono', monospace; font-size: 18px; font-weight: 700; color: #0f172a; letter-spacing: 2px;">{{ $transaction->ticket_code }}</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td align="center" style="padding-top: 24px; padding-bottom: 20px;">
                            <p style="margin: 0; font-size: 12px; color: #64748b; line-height: 1.5; max-width: 320px;">
                                E-Ticket ini bersifat rahasia dan merupakan tanda masuk resmi. Jangan bagikan email ini kepada pihak lain.
                            </p>
                            <p style="margin: 12px 0 0 0; font-size: 11px; color: #475569; font-weight: 600;">
                                &copy; {{ date('Y') }} Amikom Event Hub. All rights reserved.
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>
