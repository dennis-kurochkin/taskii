import React from "react";

import { Input, Label, Menu } from "semantic-ui-react";

const NavigationMenu = () => {
  return (
    <Menu vertical style={{ width: "100%" }}>
      <Menu.Item name="inbox" link to="/tasks">
        <Label color="teal">1</Label>
        Активные задачи
      </Menu.Item>
      <Menu.Item name="spam">
        <Label>51</Label>
        Выполненные
      </Menu.Item>
    </Menu>
  );
};

export default NavigationMenu;
