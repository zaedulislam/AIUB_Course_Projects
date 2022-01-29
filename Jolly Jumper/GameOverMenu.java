import javafx.application.Application;
import javafx.beans.property.ObjectProperty;
import javafx.beans.property.SimpleObjectProperty;
import javafx.geometry.Point2D;
import javafx.stage.Stage;
import javafx.scene.Node;
import javafx.scene.Scene;
import javafx.scene.image.ImageView;
import javafx.scene.image.Image;
import javafx.scene.paint.Color;
import javafx.scene.shape.Rectangle;
import javafx.scene.layout.*;
import javafx.scene.input.KeyEvent;
import javafx.event.EventHandler;
import javafx.scene.control.*;
import javafx.scene.effect.DropShadow;
import javafx.scene.input.MouseEvent;
import javafx.scene.layout.VBox;
import javafx.geometry.Pos;
import javafx.event.ActionEvent;
import javafx.scene.text.*;
import javafx.scene.paint.Paint;

public class GameOverMenu extends Application{
	@Override
	public void start(Stage primaryStage){
		try{
			GridPane root = new GridPane();		
			
			//create background
			Image backGroundImage = new Image("background.png",1200,0,true,false);		
			ImageView bgImageView = new ImageView(backGroundImage);
			
			root.getChildren().addAll(bgImageView);
			
			//create text 
			Label gameOverLabel = new Label("Game Over. Score: " + Hero.getScore());			
			gameOverLabel.setFont(new Font("Candara", 32));
			gameOverLabel.setTextFill(Color.web("#E8480C"));
			gameOverLabel.setTextAlignment(TextAlignment.CENTER);
			
			//create return button
			Button returnButton = new Button("Return");
			returnButton.setStyle("-fx-font: 32 candara; -fx-base: #FF9E2B;");
			
			//create shadow
			DropShadow shadow = new DropShadow();
			
			//Adding the shadow when the mouse cursor is on
			returnButton.addEventHandler(MouseEvent.MOUSE_ENTERED, 
				new EventHandler<MouseEvent>() {
					@Override public void handle(MouseEvent e) {
						returnButton.setEffect(shadow);
					}
			});
		
			//Removing the shadow when the mouse cursor is off
			returnButton.addEventHandler(MouseEvent.MOUSE_EXITED, 
				new EventHandler<MouseEvent>() {
					@Override public void handle(MouseEvent e) {
						returnButton.setEffect(null);
					}
			});
			
			//set return button action
			returnButton.setOnAction(new EventHandler<ActionEvent>() {
				@Override public void handle(ActionEvent e) {				
					GameMenu newGameMenu = new GameMenu();
					newGameMenu.start(primaryStage);
				}
			});
			
			VBox layout = new VBox(30);
			layout.getChildren().addAll(gameOverLabel, returnButton);
			layout.setAlignment(Pos.CENTER);
			
			root.getChildren().addAll(layout);
			
			Scene gameOverMenu = new Scene(root,1200,800);
			primaryStage.setScene(gameOverMenu);
			primaryStage.show();
		}catch(Exception e){
			e.printStackTrace();
		}
	}
}