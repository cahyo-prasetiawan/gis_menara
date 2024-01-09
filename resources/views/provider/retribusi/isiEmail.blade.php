<?php
function rupiah($angka)
{
// $prefix = $prefix ? $prefix : 'Rp. ';
// $nominal = $this->attributes[$field];
// return $prefix . number_format($nominal, 0, ',', '.');
$hasil = "Rp. " . number_format($angka, '2', ',' , '.');
return $hasil;
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Tagihan Retribusi</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="color-scheme" content="light">
<meta name="supported-color-schemes" content="light">
<style>
@media only screen and (max-width: 600px) {
.inner-body {
width: 100% !important;
}

.footer {
width: 100% !important;
}
}

@media only screen and (max-width: 500px) {
.button {
width: 100% !important;
}
}
</style>
</head>
<body style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; -webkit-text-size-adjust: none; background-color: #ffffff; color: #718096; height: 100%; line-height: 1.4; margin: 0; padding: 0; width: 100% !important;">

<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%; background-color: #edf2f7; margin: 0; padding: 0; width: 100%;">
<tr>
<td align="center" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative;">
<table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%; margin: 0; padding: 0; width: 100%;">
<tr>
<td class="header" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; padding: 25px 0; text-align: center;">
<a href="#" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; color: #3d4852; font-size: 19px; font-weight: bold; text-decoration: none; display: inline-block;">
<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOsAAADWCAMAAAAHMIWUAAABBVBMVEX///8BRY4pFm/u7u4Ak93t7e36+vrz8/Px8fH8/Pz29vb///0pFnAAAGMAQ40Akd0AjNsAPosAM4cANogAO4odAGoAPIolEG0iC2wAMYYPAGYeAGsAi9wAj90AAGD39/Po5+uwrMW8uczi4OjMydhqYpSalbNvirJLP4J1bpmIgqn19PfY1eFdU4xEOH1xaZlQRYWBeqKno7yTja01JHcSTZJjga+9yNfe4+c6ZJ6WqcXT3OjB2elnsOKHvuZPp+AqnN/o9PoAKoQ2KHZjWZG3s8e0wtbFzNiisck3YZyGnL9TcaQnVpaqutFTd6l5kLmozejc7Piz1OmVyetBo994vOjO4O+H//lAAAAefklEQVR4nO19CXeiPrg3HQoEArhSFbWxau202n2ztev0380u0/37f5Q3CSgIYXNp5773PufMOUyqMT+SPHuecBwhwPO8IJInUcCPPG3knUbyCGgj+bMgkyeFNEpOI32SyJNCnmS7EUJOQUipNZrXu2ur6xu/hqTubayvrrWum50aUhD+5Bi9Jxo7N1OspKN2Z2l7q2xqpmkYxcIvF6lqoWgYJv6T+t9avSHb4/gfiJUHitSor21gKEZRVX+FkKoWDVMrr7eaNSQBmczw/yisXK2+fYVhFsJAjiIumqb5e7cJZzyvAib785jsz4822lgJWVjJk+Q0WqMhT3jvtXfWTQtn6IR60f4iE6yu1mXrJ5m921iHjfHHzgFCooxJIU8SeZJpI32SyJNCnsTARslpxB3hGd1ZXzSLSUCOIsZbeLUOOcjq3T/M+GO3ZtueqMmXDe6o+R8GOi5OC6yqlk1zrcFBnrUoBdaGijF2Pg5WnoWVZ2AFqLFb0Maf0RHAZe33tYDAhFj52WAFqLmchBdFUtEsrzUUMD2scZhNLHYg1bemNKUuMszVjoV1XEbpHrtISKE0+pSoUYT1DbxLpw0VU1nbbMAxRsRo5IInKv6rBKi+oU1x8XrQLq42UMJFxpY5ww04ri6BRX9za3ZIKVptWyQ/9PN6U3tbm0zGxCCjvPRdWINYH1nDO6Yxg23qJdXc6Fg/mRSrM3aLN0mEFOfR86Sw/kwbYeO3OXuglIqL220UNMxYY59Q5uwuznz5OmSozcEwx5M54+sSkGtcmd+wfB0qaKsyh75fb8Lz2pot92WRUexAJqOcClYhAKtUW9e+dVItKmi7EoiLVWBg5T3Gt+w0ut4NP+RyEtZ962Xj+5ESMrcaig1rnLGPoTf9wPodkKF2vlFvgvLyT6zfARW0JWtwCcc+DlbAX/3Q+rVJ1baV78GKOuVvFKpsMtfxG5+9b02pmz+2VR0yNmog8X5NzMuute9Bo6pqwSH8v1EOUdyrJR57lHwdlccCt7Q4U66E8ZUN0zQ1zSwX9vaurjYIXe39Is2aaQcPyBCKRgMkGntSrKg1O6gFg6Apbq3u7lw3G7V2m+MQIc6auFqj0ejUr1vby1eGFTEpd6QZYkW7izOCiWdyb7NVb2CA2EgBwMVsoL3VgLUyoYIUDHpne91cbIKZ+dZQawZ7FePUNlZ3mgKyXYYxmI0Nq1Hnk/vWvDagzLABJZHbmTZUgvP32nUD/4YsxzSZ3cOEscfu8q2NyCiBZdtjvn093QVcMLRf2/U2/XUhyOvBeZX5CL9E0NgdiiOPxeYU2ZKKZ3RjtykTj5nCNEhtIQIhhgWANSJEAzR24wz1JtSZnl2OZ3Sj1UEIhHruKCzS2O3d3h4e3mA6PLztdUkbBGD8mGSEf0oAtWlFL9Sypu42OGyFCr5VRp4srBAJvZu7/sHDY76UzbkoW/qTvz/o390KiCxxGD12Zw0rsQi1N6aiA6sF01xtQigG/ZAoQnjZe+o/zGWzuXw+k9H1OR/pmYVcNru/cgOCO2KQR74GsoPVaVg2alG72mlzZEZZzAZIXLt3t7Kfy+YWMgyIbrQUcS73cAggjBp7Ql1iGtJGNcz/msze6ZqVuk9/73PZfARKzwRnH29oqs3U9CaxMzFU9ZdhbndkMi7WaMTDlUc8mzprxUbAzd73pulbqxUn5Uuqae7WEPD3LgAJdo8fstmFxCiHaEt9y5EauYaJVjHIOcBPipVzQBrlQSKCuD7ZZlXx6m21RQlInt6xait2+o9/8plxcVqUu6/hwTPGPgAkkkZpIHPCVNAJN6tqGrs1yd87D5Te8X5p/Al1KJPpBow9oW+tMYG+pGJxaq7ht+7rXVJqd/fZ/BSAUrDZ3lT0pokka0HbrJEEj9HeMYe6PchPCyghPV+bAtbWBIE4GkmEfs1GfnrMJpEtccDui3I8rIH7Va5NoAYb5pK/d4CkfiY3XaCE8s8war9G2Ori1tgruLC4qUj+3rt/S9NcvA5l7zxjTxqTXBp7BRt7TUZ0qXtQmlDABFOuHaCpxNIloBiRDRs8qdqazHmwAjRLpHNzCwej85RQb9odT4tQjWLd6cg2SKXuSnaGSDGVeuHzGrpfa+OFqFRtuaZ4uIEs9HMLM0WKefF9+H4Ny5xF/401rSSOBkdTcCX0pOdnjBRT9klxpdN6s23D5CtojuNMU42rBt7pIx4hpXefnT1SImQBK1Uzho6I1seQN6q53OagGytU+L+zZEluyh0jL9ZYepPUHEPnV7VdKyrhmtfD/W9Yvhbpc7559etNDB8rGkONKJh1NOLBhZy4UpqJ6sCm3DFJkCRWVKBvjZWSOsa0FvcacLQjeDj3bZNKSN9HjMRaMcK3hpYTM2FjA5C3OnyVkOO/dVIJ5e6kxL41kNzHZP4niXCw5+my6X7fTh2Q/ogS601ou5wU6qbiOgRAsN79+Sb266bsIRCCsQr+NSzwtaRKv7aGRtNYxefsN69fSpkHFOZbY0T8xJ2EWLUWHOlI7u1Pw5M0BpUaCjuEOZA5Plv9KpmbVNu1X6WlgkLu6buZ0pDy/YS+tYScSWshGmsYZqn//TGoc7qeUG9Kxpm0XXHkWJd49O3810Wl2yRYoZzImDPX0EhIpDv3A/zXocyBF5CNlRo7xATC3JnYdDw9UVhPwpkIVMBbHZEI8e2kfvwJSc9RgxILQGLTkai8ZMFk2uqJdCZzk35nyA5ufkTUuCn3NMIoI3xrCRylxrqTuCxgven457jSgDLPCfSm6/hLuHjFAzjEKmMG/NNI6SKOjzV+FF0lWYHDeeXlg59kwEPKHTKxMvdrfEep1gSOq53nj2bj5k5KCyvM/TqUOfxQHIH4lqtWHy5f4k2+n7WnMCbp+yCmfJVie4XNNeoFsN0t4uM/AhUbOz0g+OUrA6sS1/libFk5fhQrbD/+rFh1U/5YEmLNa60cb7sWCgOPN+muvT/lKOMklHlGsWKSoBlT4mC+NAwTgO7cv4MUky7xfjvHtl+JNkXNPaxK7cTbruYuJ9tprDKs/VtQ57JdB5BsD5PlW1uOs13V4hZxiNpmUfsfgzqXu4nnW4tXOcGswaEJqOz/Y1Dn8n/j6E2wFku6mkskw8Pi6OI/xIFt0o9i6U2xWJOxDiE3SL4/+mfkqkNZht7kyzyV47Am1awNs1nh8z8IFWsTvnRbv8xRVmO4X7QlR33uz1AH1ud0m+YScr/cDYj2raGNaA8i5sF2Rv4sHIYYWSafJynguczc/v7+4+M+bs3kSlmSIZ7PLzATqD2UP/Zl2Puw8iiGna414OD0QW+a9ioBmSst7B+t9I9vDm9rWO7jwUnkbIMsikqjd3v4dNz/+3y/v5DNhWPOHEjRWBvRrMnAKj+0ClsoyTN+2Sjn9IVcNn+/cnzTbRNuIgH7bAO0tG3CCmk+gKWC17qHd/2DxzxNOmZ2+KAwfWuy5NIwOpFYVRPZahaQH6YibTL5bOm+f9OVEEJWZqxX5/E3KqSmotK96T9kS4yEP30ficPv2PkSPpkT7UI0d6QBKzvOTYxTX8hmH457PJJsB0eSw7g8dQB1b1b2S97k+VIM31pkplphQxyY9hNvVgz0sX+Lhwtte58LrnAWVpwGSr27h1zOvZxLl0qk3tSKEq9aUxmMZjLVUF8oPfZ7mIXgvRijmltoIR4eSIi/ec458i/bi8a6FiFesbwZ1EjpT7KC9ayOgUogduW6OPXWLu/2Byms2dtorJsR86p1Bqkkk6zgTPb+hsgtgXEY0JduzPmiMAFYCbN+erR88bkb5LVzvOwgKqmpuK7Y3aNxVzCWon8ObhXgt6bdjJKUILQau5guZUjPDiLcCMnZwaFj0M/KbubI3OaPoad3zvvWpN/hahNxktLRoONxXcELpZXaiEhnTBR6PXl5/zz9uEhV0pUK/Vepzl+cn569v71ekrODYTUX+nhqB1hDdAkpPMhcXEf2aIQxc7szpZVLjh0hhQKZuMuT99OLajpdraZSqflRwi3Varqa+jh9P+mSNQvZeWi3WAHrR2MN1xDNumRjPRhLi9CzDz0r24o1r923s/N5AnI+gijki8+XV7sImwcrlLr7ub8BWF37NdSJWLhSaCoJHI8x6bnHw0EhS/c243kEL98+L+LAdCOuVuZPX7rI5uVu1QP0Sn99+9WKVDrZp1yoyDGXOCtci8ZRDjMLd5ityCTEy7tyefFK/Dq7qKSTwHQmuJL+eL9E0jBz1u4d3hygYaawHFCnNkxtUk1oLXlwmHxa9dKz4HAg+iSRg6DK22lqLJxDqlYuXgTkzWk/RpHyNWxejW17eytHiRlTRr9B3pMTCuLfTivV6iRAremtVk6/EHT3DuVo31qYF1Hr2Ov+NnHqc+lAQKOncTEP/TqdJxt0okl14F58cS5lE8bwrYUUYC38Vqw1nHi36pkbLKtGThNA+eVisqXrQ1v5eIUwJN/fk+GlyCHy1dyBVpigm3C35o+60P07iggvz+Yr0wRqo/1sQ2UUkKsWpL0BhwJACnE3mW28/sgL6idSmfTSX2lUKsBXvEunjpSinf+iMocXYuSthejDxXVrr/Fiot2ql54QP8BKBfvr+YyQEqq8k7xllqbixxoczSEnASn/uktiyy3sE0PS0WzQ13llqtvUQ6n0aThWx4ySAt3DqiZYWJX7BAJn4UhUnN55hFfvLJESSp+G1al1bWVxLcB+VQu/IU1OVZJwptyBu3cEPhMpgWNS5QwxedOofMVSIShxWDV2JYuZJzDmsn8VV+/g3We4zIJS85UTS+ZExSQD/Yhm0zYZH2Mv4VIfOR4h9HWR/gakFhHTPlpvCsocVk3BUkjiL+ESVUkHWD+nL08DqfoeC2tQ+LW4rlhYY3Ph0vHQ0YAtmfnZiRkGpSCjTq1znNG26WBA6rCxq9BPckcx9UMMlRpY5Dvw7BsnlVD6BHLO6U9rHAOZ46gZaI+tOJlW3RqhG8/3omf7aOD9At2Pb51UTKlPEK03CUqAMrFYoylq4DDeEs6tKEPL7eRb2O8o1g8UI5eLnaGnqmUrHQ/1Y0XR8892JVkow5dvXr+ULuJgReyADlaGKdZ4SpP+OAjQyN++VW2SYuStAXZQ0nZJCLU4mXi6rlh2JLbHT79PqLppOK+u/erTmyDHvIfB2KHOSa4bx8bJ3tpcTwDn382VLKqexsvlYqaZmnW60LmbGKwpe6zQZSNDcPozUOerL/Fy4JnMSetYWGOwpoVnxNtYf2hWsXx9jYeVpRGrWs1iNs+R21XXa1YFfgg/f2avYqqK8fL926xMmEXbPxUdnCuRA6iUHbz/DAeeJ+IVBtbSGMnEEBkuJ9WElgM9MnFr4QDKpOosQG8/BnW+SixYX26IT77yAtr2b1i1SL2lXC+KNen64D7Jr5+Dig1YVh0CP1ZeYhxFKuxZWG+jsOaeJHvZ/BxSvIZdbp8QvQn/hVGLq3BlBbmjRE7mSLELWZ5/uw7sgnqO4tbSQP/5JGzht+VKvovwv2Q7gJ5rHkcJTqWq6SFVq6xYc0yqvgPWGmYVdJX9PqfiFqSFKSKwZg7oxxT0mgQqCRynUxenp2cvbycnJ1+vr19fX28vL2enH/MVEkZPirVyiWLXqW34fBOF39bJlHCserZmvUrpIj7OdOr87OWrOyxvb50XpvsANwlfb2cf1Qqe4QSIPyhziVdLw58gUtiw3ODhPsTMirVswHs8JYLGxV9J1kNw3hopRQK/zj4STC/1NsU9Jyn5ktcKe3GwlmiBa4XvxhlWtXJx9gUQUIixGJbLBUl8EXVfzuNmGKS7XAys9hrmfYtYNWysYepw5sG6f1g6jU7uSM+fvXLUzRgrl4tMMLp8j+V1TX1YvCigloYnYxVAXwRrkYYjw5Oacof0UJP4FTWiVOXjTcbqFTNzVgpsFCE8+YiO2abekRdQaC0Nnzqh1egnw7Dq+/Z9zRGiNVU5fYWAFTVkKOeeYnEAfZ2nI9hURUxWSwN61Qk7fSCMD+eP6RYBJ6HTmkp/XmJu5IouOdLenTjK8/7iyaQRcRHxg2pEnM6HlfOGsCyXaShWzJnIaNBHyGtPpc97zvH2MbDiDQjhe9hCrnwlxAq93MkqwxqmI+qP1mjCdmt1/g0Bb94aOyE4GCsGexnscE5dcHJATHKI1Zuy6+FOBi1uA0N0/3yfg3g0YUy4csq7L5u2flJx3jzPwCp71rClbUtnlYBdS7wv7N4D2QGoj05scZn8nb8Mdq3lDi1Xe+C0plJv9DhGSKYKffGx8v1hEFdIkZQOdu9MXYI+jVrshT2aBiYHzquer5FlA1+CxpC66CLGohw7L/yVObHVMymg95DarV4rljqcBC7wqJd+T45Ny4G2XOoc+GveT4IVXrLAVrtBvYdg5eGvkYkloWbiWwuK0mVW6LHpS+a0prAkkCa8qd7PbLqMH/pEwVhDxPfSiIw1WlJoalP+jpY5eGMv4fS5xE9yeztTOeB73h9LpS9Deh+tacTZNY1II5BG0vWKy/g7nBQodHK35M+IzYVTHwhyo70Pqg5xTtUhzsqHHW2UnUan9JLVyEHvm02dosDeQ+vUohGTHWv/pLEbhJXaOBJgzur8fMQNN0z56r84hfeaCvBzVM6mu6w6tXFq3isjYWeqJQpKUGZIjoxM6jKXcPoEKL7ex9ab3FjhyO9U8W4N7j0Uq1R35xMYLfLDUtCGzZDjjQpzu1bP7IKuU8cqwxO3s6cqjF3fnx8pVVv8jZU7ITB1WCdjRGdMc5qPfRgwys7xszJH+06l3kFoff/QK+HkhntiNVpkEQZFOSTcAWSxpuoLjHnhXHCjxEpEo08u/ekChnYUfgcU5NwhACJ1cFNApE4nX4dMG4co++NeOBfFynhnx1a+QnuPvCuId10TVNigO5+dy6VnagQrw39YPQvsfUJdgn4HvtusmISXw3qPxCpea46U1Tr0N9jnGnJEOZMZs1p5DegdQns00He5XhKsr2l7t/JwdOyJ7850170vb1Pl/YkpYq3yUAys8zCwdxkpNgJr5VpPsfUme+xULU6lX5B37F5W5qkz7Xq0n2rOlcWqYW165mn43CH5mh9p6hT6esccg1M6S9vre4ViuVi4Wt/eqdegTE8CuD7pHRGzUYTn9GfOkevv7Bra0a/SZciaS4DURGE62PLkmhPE4sKI0Xtzs6yZRpHeTawWioZhmhu7HYCSXXJKxw4+SUygejmFO6Cg6/Rv4Rc1YkXWIqY+f+TnTdUT/+m+pT3Nn2xTMLSrVg3xMmXb8XQJivUFM6fKG4zUVKKx4jaHF5tLxBKGrInV90kA5tyHNf3lwYqaV0E3eRdMc7tmXSSYDCvlwVO5J9S5DbWwZ12RzLDY9SxW/tGnT76mX5G7dyBtLxZ+qfa92r7JVctaa3hRakysb9XUBYTRbDvk7hEwvL8DOndemTsKKd3BYsX5OyijF59/L/2quHtvr5O+1KJhatqiibesF65qXjU495UhI5eYMK5IkV4q6VcYNHb33SNxVNA2NxQ8haJIWJnEyErUj5Ag++Ou1bcRmfOfSW+WXG81O+Re7dZ/hukNpxS0lpJE5rxVLPYXycoidAlbHotD646UfwQ86DEsACxhRc7HnLA27Oqd3G5dNDALor2TAGvtekvzbF9V24bDiwIizV149jndO8cbA3+MqjXI9kYM0y7Tl0Tu07uIU58OVqW9SEp61RCp4/J89PDcf+oimWvueUOg5nYg8/BjfbcK8UzvfvXmos1IsGlHozYMm31BEKEv0yf1McQqiC2D1CtGh0elbC5DKFd6OMRj2fQm3uPlE9uNIce9EzW2ybgzuDjIbJHdwXf9Naryfbz0LrycOC0Oexe3imqxjVb+lEqPR7p1N6heesBWvu/m9sWl2Zi7sVRQuDtgxosdIu0ho8ZPvsYDny88/QaGHZVVowWP/+zfkJ3aW7GODmTyt8jpfbhnO2DKbkcba7h8teXxqj2cgkpOoSjIX1Muc6DwftXJlWxUVs2ONPdIqm2dnCDUtYoN6qVbxHnv1ipuSfHka6yxJ8VK5QUhYxnvEazZ+Lasnj1E4MS7YyuDArkQbhQ0ofaHlC7nwenFCRwUkcwLHPBqjdq1Uxn2+7FC+9JbdXGX3GIFuj5eTPJpkTeTlmSRWR3hlWo2lcdj2rs0XznjbO8VuUbPm49S2BBngjXumt+ywWp1wg6kW5+LInMkCYqXPVXegO1HrBXNZbF9R3tHn9XK2+Bw3p+u/zI8rWkdp5jafiVOJ9cdxrZaJjHvAQaSYoPF4yBaGbzxgc2vcKjm0ycuodU7rG0sbhNXF+6dOk/QXys+tNBHvms6jW0EhrkhwD1MyTXMmGP3+9ai1G2eW7f2bEHrkKIJ8M4nebJ9CL68ntOLS2oMkt6bq+s7HVKHgDvFdidvJxHp95Lizb0v7Cmx5GvsscfVJYZbZNMGazTID6Nj38yW+groecKFqfkvNOwdL0VywxkklSWAbR7qecGXyquaDTAp1rH0JocdbGvUHCuYDQ6KAjr2acbZFUXqXlRH4KaqZySGROSy7RKDp1XCtVasNayXGPWsrfMU08M6hu7RstTFgtkhOx/d+e7fyD0IEvCeQarOvwvDuDpArx9pkr49LO6VZWA162CqehMrpzaCYH2xQMFqdYjwfw99Jycz+12ITVmPGZBKn798XSIIL7/eP8gJ/fQnPByuCiT6sTZ9tWYnIYsZJ3RTcp0yNbHVxR2qLd5mvMF2vfSkIMFXcqBaTVcq1YpdvogURxhUaSbXhfgO8mmN6EU2Ix1xuBtErr1l0nWsbZOTkKB779WN9exDV0FfweVBUqnKGYIrA22EXAPjPVKhmm3/BvwuvYlzsYM1S/KbW21yag6t+LWK/DFA3OXnfJoBN1VNn/aQtDJ4RfoCFmCeQ8Zq4TeD2cwcq4/14ZFdW76TYrlOPqk84XXs2ba5faIgyaQUVTXlihxW09WP9y7W/I+GqyGH1UbfLSBGy30DBjdxqIvzRPzsNFZGlNAVG6RPsPGb7i91cRsgSULCg0/46LnHJxFCJH29f16QuaxidnVx+v5Fyo6Bfm64yzP3osj5DlRoDdY4mMOMNfax7F1gN+4uFonb0yS3i3NAucv58oH03MLfW44IVYSEbvf1krxrAJDSPdadE1x6pi2ja9+0LnNxGGWCsSfXJVyRtM4VdUMVFjfbuFGqHTAukMxk9/u3IodnV7ILWaLu3cMf16WEeqbLwYbvTJDWSF7PNGzs4+hN7qihvKsR6aMa5g7AH0W9hz8MZ+pCNvu40n+6ObztHd4cH+xnRxbAwj65+MFX/cDcTZI2MxWsQgBW+4eVjuXxVM29JUniZa53xLyb2ap2nsvmcr6ayM8igerdrMZWohShGGPn7Wuq6Of5wedlp9H1bvjhDzsnaESs7S2p1kI2r64lkkfaO8jGr4Kfz93hrzTL3lktqm3olhejNzfxztVpSceePLzLudmBuGaWiWaB0e4ICPDw8vgxG+eSUH2hdNDmZLDmdYb/KhYbYOopfZx3UcbVJVyvEiqNVY3qPAXTWOsg8p1efz8bcf1gJl9aIbluzSvfiTZjj1pzP+lbC8BK9KbOshVRVQ1t65p+CXPbg7lSLs8KwuuZhVz24U7AqkJn3Tepv8x10bVS/zGsxEgjc0vFRtHUNuttDqsXinR5ePz8SDlSfoH6+RcW8rlsae6hfyggBSn1La3oDUwWFluJ4q9JsU60Xwc7qrZWtoPIhmlutZqCXdMT9MhtC/2/KwcHB3/7xzc9otIjVKuv+mN0mKH/bjB75ybfr2PzYcXz1gCe29rOhmbX9C0aprG+e93hFSckZxUcxTClRrO1Xjb95X9Vs7AkYvbG6H0KfJjnw2WU8/kYy4bH4mPTHEwWDSiXfy/v7tQ7DUw1/K/TvN7ZXt/TGEFmwtqKO3JyQyTm2CfVm3yjIWkdS781Y7g2SZKLaWpDMkksnZkuUdauliJ6/7ew0vOdqLGztWhi/WAwdcQZN4jfsmASJdPcbCqRvU+GdWw7J4wd8BLhPL80w4hzm3cBA11eqiEwZt5a7LFHpLEmTH11NSKodFrL9s4MqvNLFri2sX2NJe0UfjJi7Nxw2TgrRGAtG4G1bCKSZEkAtVbfXf9FNimmYsHOU8MQywZGaewtt5o1pADmohwnBTds7Cys08xSJ1KGiJjrnd3tzfWNPcycC+rextbm9toOFkgT9p5s7LPGavVO0o7IExayil1tAJHS7fJPYBUiRdo4a9h9AJ0e5aSl/Hl6RQgvTLP3WGPnIjJW4zSO852f6D083z/Wq3SOfcxioqbX+/R1CW4CaT/b3v8P6xTYQXzv17f1btep9WafRqWxjjZKTiOzo3+ld85+lbNSQf+l3m2sseXxbKX9/w9607/R+/9SrI6Lx/t5JZz1UW+ObzT86Gj+gd7/H/CHM7ViUX13AAAAAElFTkSuQmCC" 
class="logo" alt="Laravel Logo" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; max-width: 100%; border: none; height: 75px; max-height: 85px; width: 80px;">
</a>
</td>
</tr>

<!-- Email Body -->
<tr>
<td class="body" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%; background-color: #edf2f7; border-bottom: 1px solid #edf2f7; border-top: 1px solid #edf2f7; margin: 0; padding: 0; width: 100%; border: hidden !important;">
<table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 570px; background-color: #ffffff; border-color: #e8e5ef; border-radius: 2px; border-width: 1px; box-shadow: 0 2px 0 rgba(0, 0, 150, 0.025), 2px 4px 0 rgba(0, 0, 150, 0.015); margin: 0 auto; padding: 0; width: 570px;">
<!-- Body content -->
<tr>
<td class="content-cell" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; max-width: 100vw; padding: 32px;">
    <p style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: center;"><?php
        $tanggal= mktime(date("m"),date("d"),date("Y"));
        echo "Tanggal : <b>".date("d-M-Y", $tanggal)."</b> ";
        date_default_timezone_set('Asia/Jakarta');
        $jam=date("H:i:s");
        echo "| Pukul : <b>". $jam." "."</b>";
        $a = date ("H");
        if (($a>=6) && ($a<=11)){
        echo "<b>, Selamat Pagi !!</b>";
        }
        else if(($a>11) && ($a<=15))
        {
        echo ", Selamat Siang !!";}
        else if (($a>15) && ($a<=18))
        {
        echo ", Selamat Sore !!";}
        else { echo ", <b> Selamat Malam </b>";}
        ?> </p>
<h1 style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; color: #3d4852; font-size: 18px; font-weight: bold; margin-top: 0; text-align: center;">Hello!</h1>
<p style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: center;">{{ $isi_email['title'] }}</p>

<p style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: center;">{{ $isi_email['body'] }}</p>

<h1 style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; color: #3d4852; font-size: 18px; font-weight: bold; margin-top: 0; text-align: center;">{{ rupiah($isi_email['tagihan']) }}</h1>
<table class="action" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%; margin: 30px auto; padding: 0; text-align: center; width: 100%;">
<tr>
<td align="center" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative;">
<table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative;">
<tr>
<td align="center" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative;">
<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative;">
<tr>
<td style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative;">
<a href="http://127.0.0.1:8000/" class="button button-primary" target="_blank" rel="noopener" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; -webkit-text-size-adjust: none; border-radius: 4px; color: #fff; display: inline-block; overflow: hidden; text-decoration: none; background-color: #2d3748; border-bottom: 8px solid #2d3748; border-left: 18px solid #2d3748; border-right: 18px solid #2d3748; border-top: 8px solid #2d3748;">Lihat Detail</a>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>


<table class="subcopy" width="100%" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; border-top: 1px solid #e8e5ef; margin-top: 25px; padding-top: 25px;">
<tr>
<td style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative;">
<p style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; line-height: 1.5em; margin-top: 0; text-align: left; font-size: 14px;">Jika anda ingin melihat detail tagihan retribusi menara, Tekan tombol detail atau copy link address dibawah ini
di web browser anda: <span class="break-all" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; word-break: break-all;"><a href="http://127.0.0.1:8000/" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; color: #3869d4;">http://127.0.0.1:8000/</a></span></p>

</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>

<tr>
<td style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative;">
<table class="footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 570px; margin: 0 auto; padding: 0; text-align: center; width: 570px;">
<tr>
<td class="content-cell" align="center" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; max-width: 100vw; padding: 32px;">
<p style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; line-height: 1.5em; margin-top: 0; color: #b0adc5; font-size: 12px; text-align: center;">© Diskominfo 2023</p>

</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>