﻿using System;
namespace PlayersAndMonsters
{
    public class MuseElf : Elf
    {
        public MuseElf(string username, int level) : base(username, level)
        {

        }
        public override string ToString()
        {
            return base.ToString() + ". This is a MuseElf";
        }
    }
}
