var MyMineSweeper = {
    OC: 0,
    Flags: 0,
    init: function(o) {
        this.W = o ? o.W : 7;
        this.H = o ? o.H : 7;
        this.bombs = o ? o.bombs : Math.floor(this.W * this.H / 4);
        this.placedBombs = this.bombs;

        this.generateGUI();
    },

generateGUI: function() {
        if (!this.game) {
            this.game = this.writeMainContainer();

            this.gameCont = document.createElement('table');
            this.gameCont.className = 'game-cont';

            this.gameCont.insertRow(0);
            this.gameCont.insertRow(1);

            this.gameMenu = this.gameCont.rows[0].insertCell(0);
            this.gameMenu.rowSpan = 2;
            this.gameMenu.className = 'game-menu';
            this.gameMenu.appendChild(document.createTextNode('Ширина поля:'));
            this.gameMenu.appendChild(document.createElement('br'));

            this.WInput = document.createElement('input');
            this.WInput.type = 'text';

            this.gameMenu.appendChild(this.WInput);
            this.gameMenu.appendChild(document.createTextNode('Высота поля:'));
            this.gameMenu.appendChild(document.createElement('br'));

            this.HInput = document.createElement('input');
            this.HInput.type = 'text';

            this.gameMenu.appendChild(this.HInput);
            this.gameMenu.appendChild(document.createTextNode('Кол-во мин:'));
            this.gameMenu.appendChild(document.createElement('br'));

            this.BInput = document.createElement('input');
            this.BInput.type = 'text';
            this.gameMenu.appendChild(this.BInput);

            this.Init = document.createElement('input');
            this.Init.type = 'button';
            this.Init.value = 'Старт';
            this.Init.className = 'game-start-button';

            this.Beginner = document.createElement('input');
            this.Beginner.type = 'button';
            this.Beginner.value = 'Уровень: Новичек';
            this.Beginner.className = 'game-start-button';

            this.Medium = document.createElement('input');
            this.Medium.type = 'button';
            this.Medium.value = 'Уровень: Средний';
            this.Medium.className = 'game-start-button';

            this.Expert = document.createElement('input');
            this.Expert.type = 'button';
            this.Expert.value = 'Уровень: Эксперт';
            this.Expert.className = 'game-start-button';

            this.gameMenu.appendChild(this.Init);
            this.gameMenu.appendChild(this.Beginner);
            this.gameMenu.appendChild(this.Medium);
            this.gameMenu.appendChild(this.Expert);

            this.gameStats = this.gameCont.rows[0].insertCell(1);

            this.gameField = this.gameCont.rows[1].insertCell(0);
            this.gameField.className = 'game-field';

            this.game.appendChild(this.gameCont);
        }

        if (this.board) {
            this.board.parentNode.removeChild(this.board);
            this.board = null;
        }

        this.board = this.generateField();
        this.board.cellSpacing = 0;
        this.board.className = 'game-board';

        this.gameField.appendChild(this.board);

        this.gameStats.innerHTML = 'Новая игра: поле ' + this.W + 'x' + this.H + ', ' + this.bombs + 'мин';
        this.WInput.value = this.W;
        this.HInput.value = this.H;
        this.BInput.value = this.bombs;
        this.gameStats.style.background = '#BDB76B';

        this.setupEvents();
    },

    setupEvents: function() {
        var self = this;

        var buttonClick = function() {
            self.init({W: self.WInput.value, H: self.HInput.value, bombs: self.BInput.value});
        }

        Event.add(this.Init, 'click', buttonClick);

        var bclick = function() {
            self.init({W: 9, H: 9, bombs: 10});
        }

        Event.add(this.Beginner, 'click', bclick);

        var mclick = function() {
            self.init({W: 16, H: 16, bombs: 40});
        }

        Event.add(this.Medium, 'click', mclick);

        var eclick = function() {
            self.init({W: 30, H: 16, bombs: 99});
        }

        Event.add(this.Expert, 'click', eclick);
    },

    generateField: function() {
        if (this.bombs - (this.H * this.W) > 0)
            this.gameStats.innerHTML = 'Некорректное соотношение числа бомб и размеров поля. Пожалуйста, введите другие значения';
        else {
            var self = this;
            var table = document.createElement('table');

            for (var i = 0; i < this.H; i++) {
                var r = table.insertRow(i);

                for (var j = 0; j < this.W; j++) {
                    var c = r.insertCell(j);
                    c.num = 0;
                    c.index = [i, j];

                    c.clickHandler = function () {
                        self.showInfo(this);
                    }

                    Event.add(c, 'click', c.clickHandler);

                    c.contextmenuHandler = function () {
                        self.installFlag(this);
                    }

                    Event.add(c, 'contextmenu', c.contextmenuHandler);
                }
            }
            this.OC = 0;
            this.Flags = 0;
            do {
                var hNum = this.rand(0, this.H - 1);
                var wNum = this.rand(0, this.W - 1);

                if (!table.rows[hNum].cells[wNum].bomb) {
                    table.rows[hNum].cells[wNum].num = null;
                    table.rows[hNum].cells[wNum].bomb = true;
                    this.placedBombs--;
                }
            } while (this.placedBombs > 0);

            for (var i = 0, len = table.rows.length; i < len; i++) {
                for (var j = 0, len2 = table.rows[i].cells.length; j < len2; j++) {
                    if (table.rows[i].cells[j].bomb) {
                        this.placeNumbers(table, j, i);
                    }
                }
            }

            return table;
        }
    },
            

    placeNumbers: function(t, x, y) {
        if (x > 0) {
            t.rows[y].cells[x - 1].num++;
        }

        if (x < this.W - 1) {
            t.rows[y].cells[x + 1].num++;
        }

        if (x > 0 && y > 0) {
            t.rows[y - 1].cells[x - 1].num++;
        }

        if (y > 0) {
            t.rows[y - 1].cells[x].num++;
        }

        if (y > 0 && x < this.W - 1) {
            t.rows[y - 1].cells[x + 1].num++;
        }

        if (x > 0 && y < this.H - 1) {
            t.rows[y + 1].cells[x - 1].num++;
        }

        if (y < this.H - 1) {
            t.rows[y + 1].cells[x].num++;
        }

        if (x < this.W - 1 && y < this.H - 1) {
            t.rows[y + 1].cells[x + 1].num++;
        }
    },

    installFlag: function(elem) {
        if (!elem.OC) {
            if (!elem.flag) {
                elem.flag = true;
		Event.remove(elem, 'click', elem.clickHandler);
                elem.innerHTML = '<img src ="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSqMXrgHsTztDl0KDAe-EJSCeftkNnP7uQZvXiexlRL9JbZTaC7AugQ2w8" width = "100%" height = "100%"/>';
                if (elem.bomb) {
                    this.Flags++;
                    if (this.Flags - this.bombs === 0) {
                        this.gameOver(2);
                    }
                }
            }
            else {
                elem.flag = false;
		Event.add(elem, 'click', elem.clickHandler);
                elem.innerHTML = '';
                if (elem.bomb) {
                    this.Flags--;
                }
            }
        }
    },

    showInfo: function(elem) {
        if (!elem.bomb) {
            if (elem.num > 0) {
                this.openCell(elem);
            } else {
                this.roll(elem.index[1], elem.index[0]);
            }
        } else {
            this.openCell(elem);
            this.gameOver(1);
        }
    },

    openCell: function(elem) {
        if (!elem.OC)
            this.OC++;
        elem.OC = true;
        if (!elem.bomb) {
            if (elem.num > 0) {
                elem.innerHTML = '<b>' + elem.num + '</b>';
            } else {
                elem.innerHTML = ' ';
            }

            switch (elem.num) {
                case 1:
                    elem.style.color = 'blue';
                    break;
                case 2:
                    elem.style.color = 'green';
                    break;
                case 3:
                    elem.style.color = 'red';
                    break;
                case 4:
                    elem.style.color = 'dakrblue';
                    break;
                case 5:
                    elem.style.color = 'pink';
                    break;
                case 6:
                    elem.style.color = 'navy';
                    break;
                case 7:
                    elem.style.color = 'brown';
                    break;
                case 8:
                    elem.style.color = 'grey';
                    break;
                default:
                    elem.style.color = 'black';
            }
            if (this.OC === this.W * this.H - this.bombs)
                this.gameOver(2);
        } else {
            elem.innerHTML = '<img src = "http://s00.yaplakal.com/pics/pics_original/5/5/0/5806055.jpg" width = "100%" height = "100%"/>';
        }

        elem.style.background = '#d8e0ec';
    },

    gameOver: function(val) {
        for (var i = 0, len1 = this.board.rows.length; i < len1; i++) {
            for (var j = 0, len2 = this.board.rows[i].cells.length; j < len2; j++) {
                if (this.board.rows[i].cells[j].bomb && !this.board.rows[i].cells[j].flag) {
                    this.openCell(this.board.rows[i].cells[j]);
                }

                Event.remove(this.board.rows[i].cells[j], 'click', this.board.rows[i].cells[j].clickHandler);
                Event.remove(this.board.rows[i].cells[j], 'contextmenu', this.board.rows[i].cells[j].contextmenuHandler);
            }
        }
        if (val === 1) {
            this.gameStats.style.background = 'red';
            this.gameStats.innerHTML = '<b>GAME OVER!</b>';
        }
        else if (val === 2) {
            this.gameStats.style.background = 'blue';
            this.gameStats.innerHTML = '<b>YOU WIN!</b>';
        }
    },

    roll: function(x, y) {
        if (x < 0 || y < 0 || x >= this.W || y >= this.H) {
            return;
        }

        this.openCell(this.board.rows[y].cells[x]);

        if (this.board.rows[y].cells[x].num > 0) {
            this.board.rows[y].cells[x].innerHTML = '<b>' + this.board.rows[y].cells[x].num + '</b>';
            return;
        }

        if (this.board.rows[y].cells[x].check) {
            return;
        }

        this.board.rows[y].cells[x].check = true;

        this.roll(x + 1, y);
        this.roll(x - 1, y);
        this.roll(x, y + 1);
        this.roll(x, y - 1);
        this.roll(x - 1, y - 1);
        this.roll(x + 1, y - 1);
        this.roll(x - 1, y + 1);
        this.roll(x + 1, y + 1);
    },

    writeMainContainer: function() {
        var html = '<div id="game" class="game"></div>';
        document.writeln(html);
        return document.getElementById('game');
    },

    rand: function(min, max) {
        min = parseInt(min);
        max = parseInt(max);

        return Math.floor(Math.random() * (max - min + 1)) + min;
    }
}
