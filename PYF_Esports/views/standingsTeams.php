<h1 style="margin-bottom: 50px;">Standings Teams</h1>

<div style="margin-bottom: 20px;">
    <label for="cars">Choose a map:</label>
    <select style="background-color: #12173a; color: white; border: 1px solid white; padding: 5px; border-radius: 10px">
        <option>All-time</option>
        <option>Ascent</option>
        <option>Bind</option>
        <option>Breeze</option>
        <option>Fracture</option>
        <option>Haven</option>
        <option>Icebox</option>
        <option>Lotus</option>
        <option>Pearl</option>
        <option>Split</option>
        <option>Sunset</option>
    </select>
</div>

<img style="margin-bottom: 40px; border: 3px solid black" src="/images/Bind.webp" height="225px" width="396px">

<div style="overflow-x:auto">
    <table id="tableStandingsPlayers">
        <thead>
            <tr>
                <th id="stickyRank" style="background-color: #030821">#</th>
                <th id="stickyLogo" style="background-color: #030821">LOGO</th>
                <th id="stickyPlayer">TEAM</th>
                <th data-toggle="tooltip" data-placement="top" title="Win %">WIN%</th>
                <th data-toggle="tooltip" data-placement="top" title="Won">W</th>
                <th data-toggle="tooltip" data-placement="top" title="Lost">L</th>
                <th data-toggle="tooltip" data-placement="top" title="Attack Round Win %">ATK RWIN%</th>
                <th data-toggle="tooltip" data-placement="top" title="Rounds Wons">RW</th>
                <th data-toggle="tooltip" data-placement="top" title="Rounds Lost">RL</th>
                <th data-toggle="tooltip" data-placement="top" title="Defense Round Win %">DEF RWIN%</th>
                <th data-toggle="tooltip" data-placement="top" title="Rounds Wons">RW</th>
                <th data-toggle="tooltip" data-placement="top" title="Rounds Lost">RL</th>
            <tr>
            <tr>
                <th id="stickyRank">1</th>
                <th id="stickyLogo"><img src="/images/Sentinels.png" width="30px" height="30px"></th>
                <td id="stickyPlayer">Sentinels</td>
                <td>73%</td>
                <td>45</td>
                <td>17</td>
                <td>55%</td>
                <td>375</td>
                <td>306</td>
                <td>57%</td>
                <td>371</td>
                <td>283</td>
            </tr>
            <tr>
                <th id="stickyRank">2</th>
                <th id="stickyLogo"><img src="/images/TL.png" width="30px" height="30px"></th>
                <td id="stickyPlayer">Team Liquid</td>
                <td>73%</td>
                <td>45</td>
                <td>17</td>
                <td>55%</td>
                <td>375</td>
                <td>306</td>
                <td>57%</td>
                <td>371</td>
                <td>283</td>
            </tr>
            <tr>
                <th id="stickyRank">3</th>
                <th id="stickyLogo"><img src="/images/LogoTemplate.png" width="30px" height="30px"></th>
                <td id="stickyPlayer">Rogue</td>
                <td>73%</td>
                <td>45</td>
                <td>17</td>
                <td>55%</td>
                <td>375</td>
                <td>306</td>
                <td>57%</td>
                <td>371</td>
                <td>283</td>
            </tr>
            <tr>
                <th id="stickyRank">4</th>
                <th id="stickyLogo"><img src="/images/Fnatic.png" width="30px" height="30px"></th>
                <td id="stickyPlayer">Fnatic</td>
                <td>73%</td>
                <td>45</td>
                <td>17</td>
                <td>55%</td>
                <td>375</td>
                <td>306</td>
                <td>57%</td>
                <td>371</td>
                <td>283</td>
            </tr>
        </thead>
    </table>
</div>

<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
