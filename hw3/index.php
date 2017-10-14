<!DOCTYPE html>

<html>
    <head>
        <title>Character Creation</title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        <h1>Character Creation</h1>
        <br />
        <div>
            <div id="left" class="outerBorder">
                <h2>Construct your character</h2>         
                         <!--- HTML form goes here! ---->
                <form>
                <label>Name: </label>
                <input type="text" name="name" value="<?=$_GET['name']?>"/>
                
                
                <br /><br />
                <label>Gender: </label>
                <input type="radio" id="maleGen" name="layout" value="male">
                <label for="Male"></label><label for="mgen">Male</label>
                <input type="radio" id="femGen" name="layout" value="female">
                <label for="Vertical"></label><label for="fgen">Female</label>
                <br /><br />
                
                <label>Class: </label>
                <select name ="category">
                    <option value="n/a">Select One</option>
                    <option value="swordsman">Swordsman</option>
                    <option value="archer">Archer</option>
                    <option value="thief">Thief</option>
                    <option value="acolyte">Acolyte</option>
                    <option value="novice">Novice</option>
                </select>
                </form>
                <br />
                
                 <label>Background: </label>
                <select name ="category">
                    <option value="n/a">Select One</option>
                    <option value="beach">Beach</option>
                    <option value="forest">Forest</option>
                    <option value="mountain">Mountain</option>
                    <option value="lake">Lake</option>
                    <option value="snow">Snow</option>
                    <option value="desert">Desert</option>
                </select>
                </form>
                <br /> <br />
                <input type="submit" value="Create"/>
            </div>
            
            <div id="right" class="outerBorder">
                
            </div>
            
        </div>
    </body>
</html>