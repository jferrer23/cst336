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
            <div id="left">
                <h2>Construct your character</h2>         
                         <!--- HTML form goes here! ---->
                <form>
                <label>Name: </label>
                <input type="text" name="name" placeholder="John Smith" value="<?=$_GET['name']?>"/>
                
                
                <br /><br />
                <label>Gender: </label>
                <input type="radio" id="maleGen" name="layout" value="male">
                <label for="Male"></label><label for="mgen">Male</label>
                <input type="radio" id="femGen" name="layout" value="female">
                <label for="Vertical"></label><label for="fgen">Female</label>
                <br /><br />
                
                <select name ="category">
                    <option value="n/a">Select One</option>
                    <option value="ocean">Sea</option>
                    <option value="forest">Forest</option>
                    <option value="mountain">Mountain</option>
                    <option value="snow">Snow</option>
                    <option value="lightning">Lightning</option>
                    <option value="fire">Fire</option>
                    <option value="animals">Animals</option>
                </select>
                </form>
                <br />
                <input type="submit" value="Create"/>
            </div>
            
            <div id="right">
                
            </div>
            
        </div>
    </body>
</html>